<?php

require_once('init.php');
global $link;
// prevent direct access
$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND
strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
if(!$isAjax) {
  $user_error = 'Access denied - not an AJAX request...';
  trigger_error($user_error, E_USER_ERROR);
}
 
// get what user typed in autocomplete input
$term = trim($_GET['term']);
 
$a_json = array();
$a_json_row = array();
 
$a_json_invalid = array(array("id" => "#", "value" => $term, "label" => "Only letters and digits are permitted..."));
$json_invalid = json_encode($a_json_invalid);
 
// replace multiple spaces with one
$term = preg_replace('/\s+/', ' ', $term);
 
// SECURITY HOLE ***************************************************************
// allow space, any unicode letter and digit, underscore and dash
if(preg_match("/[^\040\pL\pN_-]/u", $term)) {
  print $json_invalid;
  exit;
}
// *****************************************************************************

$term=translate($term);


$parts = explode(' ', $term);
$p = count($parts);
 
/**
 * Create SQL
 */
$sql = 'SELECT id,asciiname,admin2,admin3 FROM geoname_crete WHERE not isnull(admin2)';
for($i = 0; $i < $p; $i++) {
  $sql .= ' AND asciiname LIKE ' . "'%" . $link->real_escape_string($parts[$i]) . "%'";
}
 
$rs = $link->query($sql);
if($rs === false) {
  $user_error = 'Wrong SQL: ' . $sql . 'Error: ' . $link->errno . ' ' . $link->error;
  trigger_error($user_error, E_USER_ERROR);
}
 
while($row = $rs->fetch_assoc()) {
  $a_json_row["id"] = $row['id'];
	$a_json_row["value"] = $row['asciiname'] ;
	$a_json_row["label"] = $row['asciiname']. ' ' . $row['admin2'];
	$a_json_row["region"] = mb_strtoupper($row['admin2']);

  /*if($row['asciiname']!=$row['admin2']) {
	  $a_json_row["value"] = $row['asciiname'] . ' ' . $row['admin2'];
	  $a_json_row["label"] = $row['asciiname'].' '.$row['admin2'];
  }
	else
	{
		$a_json_row["value"] = $row['asciiname'];
		$a_json_row["label"] = $row['asciiname'];
	}*/


  array_push($a_json, $a_json_row);
}
 
// highlight search results
//$a_json = apply_highlight($a_json, $parts);
 
$json = json_encode($a_json);
print $json;




function mb_stripos_all($haystack, $needle) {
 
  $s = 0;
  $i = 0;
 
  while(is_integer($i)) {
 
    $i = mb_stripos($haystack, $needle, $s);
 
    if(is_integer($i)) {
      $aStrPos[] = $i;
      $s = $i + mb_strlen($needle);
    }
  }
 
  if(isset($aStrPos)) {
    return $aStrPos;
  } else {
    return false;
  }
}
 
/**
 * Apply highlight to row label
 *
 * @param string $a_json json data
 * @param array $parts strings to search
 * @return array
 */
function apply_highlight($a_json, $parts) {
 
  $p = count($parts);
  $rows = count($a_json);
 
  for($row = 0; $row < $rows; $row++) {
 
    $label = $a_json[$row]["label"];
    $a_label_match = array();
 
    for($i = 0; $i < $p; $i++) {
 
      $part_len = mb_strlen($parts[$i]);
      $a_match_start = mb_stripos_all($label, $parts[$i]);
 
      foreach($a_match_start as $part_pos) {
 
        $overlap = false;
        foreach($a_label_match as $pos => $len) {
          if($part_pos - $pos >= 0 && $part_pos - $pos < $len) {
            $overlap = true;
            break;
          }
        }
        if(!$overlap) {
          $a_label_match[$part_pos] = $part_len;
        }
 
      }
 
    }
 
    if(count($a_label_match) > 0) {
      ksort($a_label_match);
 
      $label_highlight = '';
      $start = 0;
      $label_len = mb_strlen($label);
 
      foreach($a_label_match as $pos => $len) {
        if($pos - $start > 0) {
          $no_highlight = mb_substr($label, $start, $pos - $start);
          $label_highlight .= $no_highlight;
        }
        $highlight = '<span class="hl_results">' . mb_substr($label, $pos, $len) . '</span>';
        $label_highlight .= $highlight;
        $start = $pos + $len;
      }
 
      if($label_len - $start > 0) {
        $no_highlight = mb_substr($label, $start);
        $label_highlight .= $no_highlight;
      }
 
      $a_json[$row]["label"] = $label_highlight;
    }
 
  }
 
  return $a_json;
 
}

function translate($terms){
	$terms=str_replace(array('αυ','αύ','Αυ','Αύ'),'au',$terms);
	$terms=str_replace(array('ου','ού','Ου','Ού'),'ou',$terms);
	$terms=str_replace(array('ευ','εύ','Ευ','Εύ'),'eu',$terms);


	$terms=str_replace(array('α','ά','Α','Ά'),'a',$terms);
	$terms=str_replace(array('β','Β'),'v',$terms);
	$terms=str_replace(array('γ','Γ'),'g',$terms);
	$terms=str_replace(array('δ','Δ'),'d',$terms);
	$terms=str_replace(array('ε','έ','Ε','Έ'),'e',$terms);
	$terms=str_replace(array('ζ','Ζ'),'z',$terms);
	$terms=str_replace(array('η','ή','Η','Ή'),'i',$terms);
	$terms=str_replace(array('θ','Θ'),'th',$terms);
	$terms=str_replace(array('ι','ί','Ι','Ί'),'i',$terms);
	$terms=str_replace(array('κ','Κ'),'k',$terms);
	$terms=str_replace(array('λ','Λ'),'l',$terms);
	$terms=str_replace(array('μ','Μ'),'m',$terms);
	$terms=str_replace(array('ν','Ν'),'n',$terms);
	$terms=str_replace(array('ξ','Ξ'),'ks',$terms);
	$terms=str_replace(array('ο','ό','Ο','Ό'),'o',$terms);
	$terms=str_replace(array('π','Π'),'p',$terms);
	$terms=str_replace(array('ρ','Ρ'),'r',$terms);
	$terms=str_replace(array('σ','ς','Σ'),'s',$terms);
	$terms=str_replace(array('τ','Τ'),'t',$terms);
	$terms=str_replace(array('υ','ύ','Υ','Ύ'),'y',$terms);
	$terms=str_replace(array('φ','Φ'),'f',$terms);
	$terms=str_replace(array('χ','Χ'),'ch',$terms);
	$terms=str_replace(array('ψ','Ψ'),'ps',$terms);
	$terms=str_replace(array('ω','ώ','Ω','Ώ'),'w',$terms);
	/*for($i=0; $i<mb_strlen($terms,'utf-8'); $i++) {
		switch ( $terms[ $i ] ) {
			case 'α':
			case 'ά':
				$terms[ $i ] = 'a';
				break;

		}
	}*/

return $terms;



//	}


}



?>