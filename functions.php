<?php

// String function

//#1 mkRevers
    function mkRevers($incomingString){
        $output = "";
        $wordsNum = mkGetWords($incomingString);
            for($i= mkCount($wordsNum); $i> 0; --$i){
                $output .= $wordsNum[$i-1]." ";
            }
            return $output;  
    }

//#2 mkGetWords   
    function mkGetWords($incomingString){ 
        $result=[];
        $output = "";
        $counter=0;
        for($i=0; $i< mkLength($incomingString); $i++){         
            if($incomingString[$i] ==" "){
                $result[$counter] = $output;
                $counter++; 
                $output = "";
                continue;
            }
            $output .=$incomingString[$i]; 
            } $result[$counter] = $output;
            return $result;
    }

//#3 mkSprerate
    function mkSeparate( $sperator,$incomingString){
        $result=[];
        $output = "";
        $counter=0;
        for($i=0; $i< mkLength($incomingString); $i++){         
            if($incomingString[$i] ==$sperator){
                $result[$counter] = $output;
                $counter++; 
                $output = "";
                continue;
            }
            $output .=$incomingString[$i]; 
            } $result[$counter] = $output;
            return $result;
    }

//#4 mkLength
    function mkLength($incomingString) {
        $temp ="";
        $counter=0;
            for ($i = 0;$incomingString[$i] !==null; $i++){
                $temp .= $incomingString[$i];   
                $counter++;
                if($temp == $incomingString)
                break;
             }return $counter;
    }

//#5 mkSubstring
    function mkSubstring($incomingString,$start,$end){
        $result ="";
            for($i = $start;$i<=$end; $i++){ 
                $result .= $incomingString[$i]; 
        }
        return $result;
    }

//#6 mkWordCount
    function mkWordCount($incomingString){ 
        return mkCount(mkGetWords($incomingString));  
    } 
 
//#7 mkFindIndex ?
    function mkFindIndex($incomingString,$goolString){
        $incomingString = mkToupper($incomingString);
        $goolString = mkToupper($goolString);
        $goolStringlength =mkLength($goolString);  
        for($i=0,$j=0;$i<mkLength($incomingString);$i++){ 
            if($incomingString[$i] == $goolString[$j]){ 
                $issame=true; 
                for($s=1;$s<$goolStringlength;$s++){
                    if($incomingString[$i+$s] != $goolString[$s]){
                        $issame=false;
                    } 
                    if(!$issame)
                    break;  
                } 
                if($issame) return $i;
            }
        }
        return -1;
    } 

//#8 mkToupper
    function mkToupper($incomingString){
        for($i=0;$i<mkLength($incomingString);$i++){
            if(ord($incomingString[$i])>=97 && ord($incomingString[$i])<=122)
            $incomingString[$i] = chr(ord($incomingString[$i])-32);
        } 
        return $incomingString;
    }

//#9 mkTolower
    function mkTolower($incomingString){
        for($i=0;$i<mkLength($incomingString);$i++){
            if(ord($incomingString[$i])>=65 && ord($incomingString[$i])<=90)
            $incomingString[$i] = chr(ord($incomingString[$i])+32);
        } 
        return $incomingString;
    }
 
//#10 mkAppend 
    function mkAppend($incomingString,$addString){
        return $incomingString.$addString;
    } 

//#11 mkAppbefor
    function mkAppbefor($incomingString,$addString){
        return $addString.$incomingString;
    }

//#12 mkLtrim ?
   function mkltrim($incomingString){
      $result="";
      $counter=0;
      for($i=0;$i<mkLength($incomingString);$i++){
        if($incomingString[$i]!=" ")break;
        $counter++;       
      }
      $result = mkGetLaststr($incomingString,mkLength($incomingString)-$counter); 
      return $result;
   }

//#13 mkCount
   function mkCount(array $incomingarray){  
        $counter = 0;
        for($i=0; isset($incomingarray[$i]);$i++){
            $counter++;
        }
        return $counter;
   }

//#14 mkReplace 
   function mkReplace($searsh,$replace,$subject){
    if($replace ==""){
        $replaceLength=1; 
    }else $replaceLength = mkLength($replace);
    $searshLength = mkLength($searsh);  
       for($i=0,$j=0;$i<mkLength($subject);$i++){
           if($subject[$i]==$searsh[$j]){
            $issame=true; 
            for($s=1;$s<$searshLength;$s++){
                if($subject[$i+$s] != $searsh[$s]){
                    $issame=false;
                } 
                if(!$issame)
                break;  
            } 
            if($issame){
                if($replaceLength>$searshLength){
                    for($r=0;$r<$replaceLength;$r++){
                        $subject[$i+$r]=$replace[$r];
                    }
                    return $subject; 
                }else{
                    for($r=0;$r<$searshLength;$r++){
                        if(isset($replace[$r]))
                        $subject[$i+$r]=$replace[$r];
                        else $subject[$i+$r]=" ";
                    }
                    return $subject;
                }            
            }      
           }
       }
       return $subject;
   }

//#15 mklastIndex 
   function mklastIndex($incomingString,$goolString){
    $incomingString = mkToupper($incomingString);
    $goolString = mkToupper($goolString);
    $goolStringlength =mkLength($goolString);  
    for($i=0,$j=0;$i<mkLength($incomingString);$i++){ 
        if($incomingString[$i] == $goolString[$j]){ 
            $issame=true; 
            for($s=1;$s<$goolStringlength;$s++){
                if($incomingString[$i+$s] != $goolString[$s]){
                    $issame=false;
                } 
                if(!$issame)
                break;  
            } 
            if($issame) return $i+$s-1;
        }
    }
    return -1;
   } 

//#16 mkGetLaststr
   function mkGetLaststr($incomingString,$count){ 
       $result=$result=mkSubstring($incomingString,(mkLength($incomingString)-$count),mkLength($incomingString)-1); 
       return $result;  
   }

//#17 mkGetFirststr
    function mkGetFirststr($incomingString,$count){  
        $result=mkSubstring($incomingString,0,$count-1); 
        return $result; 
    } 

//#18 mkRtrim
    function mkRtrim($incomingString){
        $result="";
        $counter= 0;    
        for($i=mkLength($incomingString)-1;$i>=0;$i--){
                if($incomingString[$i]!=" ")break;
                $counter++;       
              }
              $result = mkGetFirststr($incomingString,mkLength($incomingString)-$counter); 
              return $result;
    }  

//#19 mkTrim
    function mkTrim($incomingString){
        $result = mkltrim($incomingString);
        $result = mkRtrim($result);
        return $result;   
    }  
 
//#20 mkAlphabetSort
    function mkAlphabetSort(&$incomingarray){
        $counter=0;
        $isrepeted=false;   
       for($i=0;$i<mkCount($incomingarray);$i++){
        for($j=$i+1;$j<mkCount($incomingarray);$j++){
            if(mkToupper($incomingarray[$i])==mkToupper($incomingarray[$j])) continue;
            if(mkToupper($incomingarray[$j][$counter])==mkToupper($incomingarray[$i][$counter])){
                $isrepeted=true;    
                $counter++; 
                $j--;
                continue;
            }
            if(mkToupper($incomingarray[$j][$counter])< mkToupper($incomingarray[$i][$counter])){
                mkSwap($incomingarray[$j],$incomingarray[$i]);
            }
            if($isrepeted){
                $counter=0;
                $isrepeted=false;
            }
        }  
       }  
    }

//#21 mkAlphabetSortDeced
    function mkAlphabetSortDeced(&$incomingarray){
        $counter=0;
        $isrepeted=false;   
       for($i=0;$i<mkCount($incomingarray);$i++){
        for($j=$i+1;$j<mkCount($incomingarray);$j++){
            if(mkToupper($incomingarray[$i])==mkToupper($incomingarray[$j])) continue;
            if(mkToupper($incomingarray[$j][$counter])==mkToupper($incomingarray[$i][$counter])){
                $isrepeted=true;    
                $counter++; 
                $j--;
                continue;
            }
            if(mkToupper($incomingarray[$j][$counter])> mkToupper($incomingarray[$i][$counter])){
                mkSwap($incomingarray[$j],$incomingarray[$i]);
            }
            if($isrepeted){
                $counter=0;
                $isrepeted=false;
            }
        }  
       }  
    }

//#22 mkIscontain
    function mkIscontain($incomingString,$key){
        for($i=0;$i<mkLength($incomingString);$i++){
            if($incomingString[$i]==$key) return true;  
        }
        return false;
    }

//#23 mkShiftCipherEnc
    function mkShiftCipherEnc($incomingString,$key){
        $result="";
        for($i=0;$i<mkLength($incomingString);$i++){
            if(ord($incomingString[$i])==32)
            {
                $result.=$incomingString[$i];
                continue;
            } 
            if(ord($incomingString[$i])>96 && ord($incomingString[$i]) < 123){
               $temp = ord($incomingString[$i]) - 97;
                $temp += $key;
                $temp = mkMode($temp,26); 
                $temp +=97;
                $result.=chr($temp); 
            }   
            elseif(ord($incomingString[$i])>64 && ord($incomingString[$i]) < 91){
                $temp = ord($incomingString[$i]) - 65;
                $temp += $key;
                $temp = mkMode($temp,26); 
                $temp += 65;
                $result.=chr($temp); 
            }   
        }
        return $result;
    }

//#24 mkShiftCipherDec
    function mkShiftCipherDec($incomingString,$key){
        $result="";
        for($i=0;$i<mkLength($incomingString);$i++){
            if(ord($incomingString[$i])==32){
                $result.=$incomingString[$i];
                continue;
            } 
            if(ord($incomingString[$i])>96 && ord($incomingString[$i]) < 123){
               $temp = ord($incomingString[$i]) - 97;
                $temp -= $key;
                $temp = mkMode($temp,26); 
                if($temp < 0){
                    $temp = $temp +26;
                    $temp = $temp +97; 
                } else $temp = $temp + 97;
                $result.=chr($temp); 
            }   
            elseif(ord($incomingString[$i])>64 && ord($incomingString[$i]) < 91){
                $temp = ord($incomingString[$i]) - 65;
                $temp -= $key;
                $temp = mkMode($temp,26); 
                if($temp < 0){
                    $temp = $temp +26;
                    $temp = $temp +65; 
                } else $temp = $temp + 65;
                $result.=chr($temp); 
            }   
        }
        return $result;
    }

//#25 mkIsset
    function mkIsset($incomingVariable){
        if($incomingVariable === null) return false;
        else return true;
    }

//#26 mkEcho
    function mkEcho($incomingString){?>
        <?php
            for($i=0;$i<mkLength($incomingString);$i++){
                if(strval($incomingString[$i])==' '){?> <?php }
                elseif(strval($incomingString[$i])=='A'){?>A<?php } 
                elseif(strval($incomingString[$i])=='B'){?>B<?php }
                elseif(strval($incomingString[$i])=='C'){?>C<?php } 
                elseif(strval($incomingString[$i])=='D'){?>D<?php } 
                elseif(strval($incomingString[$i])=='E'){?>E<?php } 
                elseif(strval($incomingString[$i])=='F'){?>F<?php } 
                elseif(strval($incomingString[$i])=='G'){?>G<?php }
                elseif(strval($incomingString[$i])=='H'){?>H<?php } 
                elseif(strval($incomingString[$i])=='I'){?>I<?php } 
                elseif(strval($incomingString[$i])=='J'){?>J<?php } 
                elseif(strval($incomingString[$i])=='K'){?>K<?php } 
                elseif(strval($incomingString[$i])=='L'){?>L<?php }
                elseif(strval($incomingString[$i])=='M'){?>M<?php } 
                elseif(strval($incomingString[$i])=='N'){?>N<?php } 
                elseif(strval($incomingString[$i])=='O'){?>O<?php } 
                elseif(strval($incomingString[$i])=='P'){?>P<?php } 
                elseif(strval($incomingString[$i])=='Q'){?>Q<?php }
                elseif(strval($incomingString[$i])=='R'){?>R<?php } 
                elseif(strval($incomingString[$i])=='S'){?>S<?php } 
                elseif(strval($incomingString[$i])=='T'){?>T<?php } 
                elseif(strval($incomingString[$i])=='U'){?>U<?php } 
                elseif(strval($incomingString[$i])=='V'){?>V<?php }
                elseif(strval($incomingString[$i])=='W'){?>W<?php } 
                elseif(strval($incomingString[$i])=='X'){?>X<?php } 
                elseif(strval($incomingString[$i])=='Y'){?>Y<?php } 
                elseif(strval($incomingString[$i])=='Z'){?>Z<?php } 
                elseif(strval($incomingString[$i])=='a'){?>a<?php } 
                elseif(strval($incomingString[$i])=='b'){?>b<?php }
                elseif(strval($incomingString[$i])=='c'){?>c<?php } 
                elseif(strval($incomingString[$i])=='d'){?>d<?php } 
                elseif(strval($incomingString[$i])=='e'){?>e<?php } 
                elseif(strval($incomingString[$i])=='f'){?>f<?php } 
                elseif(strval($incomingString[$i])=='g'){?>g<?php }
                elseif(strval($incomingString[$i])=='h'){?>h<?php } 
                elseif(strval($incomingString[$i])=='i'){?>i<?php } 
                elseif(strval($incomingString[$i])=='j'){?>j<?php } 
                elseif(strval($incomingString[$i])=='k'){?>k<?php } 
                elseif(strval($incomingString[$i])=='l'){?>l<?php }
                elseif(strval($incomingString[$i])=='m'){?>m<?php } 
                elseif(strval($incomingString[$i])=='n'){?>n<?php } 
                elseif(strval($incomingString[$i])=='o'){?>o<?php } 
                elseif(strval($incomingString[$i])=='p'){?>p<?php } 
                elseif(strval($incomingString[$i])=='q'){?>q<?php }
                elseif(strval($incomingString[$i])=='r'){?>r<?php } 
                elseif(strval($incomingString[$i])=='s'){?>s<?php } 
                elseif(strval($incomingString[$i])=='t'){?>t<?php } 
                elseif(strval($incomingString[$i])=='u'){?>u<?php } 
                elseif(strval($incomingString[$i])=='v'){?>v<?php }
                elseif(strval($incomingString[$i])=='w'){?>w<?php } 
                elseif(strval($incomingString[$i])=='x'){?>x<?php } 
                elseif(strval($incomingString[$i])=='y'){?>y<?php }
                elseif(strval($incomingString[$i])=='z'){?>z<?php }  
                elseif(strval($incomingString[$i])=='0'){?>0<?php } 
                elseif(strval($incomingString[$i])=='1'){?>1<?php } 
                elseif(strval($incomingString[$i])=='2'){?>2<?php } 
                elseif(strval($incomingString[$i])=='3'){?>3<?php } 
                elseif(strval($incomingString[$i])=='4'){?>4<?php }
                elseif(strval($incomingString[$i])=='5'){?>5<?php } 
                elseif(strval($incomingString[$i])=='6'){?>6<?php } 
                elseif(strval($incomingString[$i])=='7'){?>7<?php } 
                elseif(strval($incomingString[$i])=='8'){?>8<?php } 
                elseif(strval($incomingString[$i])=='9'){?>9<?php }
                elseif(strval($incomingString[$i])=='\\'){?>\<?php } 
                elseif(strval($incomingString[$i])=='/'){?>/<?php }
                elseif(strval($incomingString[$i])=='~'){?>~<?php } 
                elseif(strval($incomingString[$i])=='!'){?>!<?php } 
                elseif(strval($incomingString[$i])=='@'){?>@<?php } 
                elseif(strval($incomingString[$i])=='#'){?>#<?php } 
                elseif(strval($incomingString[$i])=='$'){?>$<?php }
                elseif(strval($incomingString[$i])=='%'){?>%<?php } 
                elseif(strval($incomingString[$i])=='^'){?>^<?php } 
                elseif(strval($incomingString[$i])=='&'){?>&<?php } 
                elseif(strval($incomingString[$i])=='*'){?>*<?php }
                elseif(strval($incomingString[$i])=='('){?>(<?php } 
                elseif(strval($incomingString[$i])==')'){?>)<?php } 
                elseif(strval($incomingString[$i])=='_'){?>_<?php }
                elseif(strval($incomingString[$i])=='-'){?>-<?php } 
                elseif(strval($incomingString[$i])=='+'){?>+<?php } 
                elseif(strval($incomingString[$i])==':'){?>:<?php } 
                elseif(strval($incomingString[$i])==';'){?>;<?php }
                elseif(strval($incomingString[$i])=='*'){?>*<?php }
                elseif(strval($incomingString[$i])==','){?>,<?php } 
                elseif(strval($incomingString[$i])=='?'){?>?<?php } 
                elseif(strval($incomingString[$i])=='؟'){?>؟<?php }
                elseif(strval($incomingString[$i])=='"'){?>"<?php } 
                elseif(strval($incomingString[$i])=='\''){?>'<?php } 
                elseif(strval($incomingString[$i])=='<'){?><<?php } 
                elseif(strval($incomingString[$i])=='>'){?>><?php }
        } ?>

    <?php } 

//#27 mkAscci
    function mkAscci($char){
        $ASCCi=[0 => 48, 1 => 49, 2 => 50, 3 => 51, 4 => 52, 5 => 53, 6 => 54, 7 =>55, 8 => 56, 9 => 57
                ,"A" => 65 ,"B" => 66 ,"C" => 67 ,"D" => 68 ,"E" => 69 ,"F" => 70 ,"G" => 71 ,"H" => 72 ,"I" => 73 ,"J" => 74 ,"K" => 75 ,"L" => 76 ,"M" => 77 ,"N" => 78 ,"O" => 79 ,"P" => 80 ,"Q" => 81 ,"R" => 82 ,"S" => 83 ,"T" => 84 ,"U" => 85 ,"V" => 86 ,"W" => 87 ,"X" => 88 ,"Y" => 89 ,"Z" => 90 
                ,"a" => 97 ,"b" => 98 ,"c" => 99 ,"d" => 100 ,"e" => 101 ,"f" => 102 ,"g" => 103 ,"h" => 104 ,"i" => 105 ,"j" => 106 ,"k" => 107 ,"l" => 108 ,"m" => 109 ,"n" => 110 ,"o" => 111 ,"p" => 112 ,"q" => 113 ,"r" => 114 ,"s" => 115 ,"t" => 116 ,"u" => 117 ,"v" => 118 ,"w" => 119 ,"x" => 120 ,"y" => 121 ,"z" => 122
                ];
            if(isset($ASCCi[$char]))
                return $ASCCi[$char];

        return -1 ;
    }

//#28 mkChar
    function mkChar($ascci){
        $char = [ 48 => 0, 49 => 1, 50 => 2, 51 => 3, 52 => 4, 53 => 5, 54 => 6, 55 => 7, 56 => 8, 57 => 9
            ,65 => "A", 66 => "B", 67 => "C", 68 => "D", 69 => "E", 70 => "F", 71 => "G", 72 => "H", 73 => "I", 74 => "J", 75 => "K", 76 => "L", 77 => "M", 78 => "N", 79 => "O", 80 => "P", 81 => "Q", 82 => "R", 83 => "S", 84 => "T", 85 => "U", 86 => "V", 87 => "W", 88 => "X", 89 => "Y", 90 => "Z" 
            ,97 => "a", 98 => "b", 99 => "c", 100 => "d", 101 => "e", 102 => "f", 103 => "g", 104 => "h", 105 => "i", 106 => "j", 107 => "k", 108 => "l", 109 => "m", 110 => "n", 111 => "o", 112 => "p", 113 => "q", 114 => "r", 115 => "s", 116 => "t", 117 => "u", 118 => "v", 119 => "w", 120 => "x", 121 => "y", 122 => "z"
        ];
        if(isset($char[$ascci]))
            return $char[$ascci];

        return -1;
    }

//#29 mkIsnull
    function mkIsnull($value){
        if($value === null)
            return true ;
        return false;
    }

//#30 mkIsStrEndsWith
    function mkIsStrEndsWith(string $string, string $needle): bool{
        $test='';
        $countNeeded =my_strlen($needle);
        for ($i=my_strlen($string)-($countNeeded+1); $i < $countNeeded ; $i++) 
            $test +=$string[$i]; 
        
        return $test == $needle ? true : false;
    }

//#31 mkGetHour
    function mkGetHour($date){
        $newtime = explode(' ',$date);
        $hour = explode(':', $newtime[1]);
        return $hour[0];
    }

//#32 mkGetMinutes
    function mkGetMinutes($date){
        $newtime = explode(' ',$date);
        $hour = explode(':', $newtime[1]);
        return $hour[1];
    }

//#33 mkGetSec
    function mkGetSec($date){
        $newtime = explode(' ',$date);
        $hour = explode(':', $newtime[1]);
        return $hour[1];
    }

//#34 mkGetTime
    function mkGetTime($date){
        $newDate = explode(' ',$date);
        return $newDate[1];
    }

//#35 mkGetAMPM
    function mkGetAMPM($date){
        $newDate = explode(' ',$date);
        return $newDate[2];
    }

//#36 mkUCFirst

    function mkUCFirst($string){
        $count = 1;
        $string[0]=my_strtoupper($string[0]);
        return $string;
    }

//#37 mkLCFirst
    function mkLCFirst($string){
        $count = 1;
        $string[0]=my_strtolower($string[0]);
        return $string;
    }

//#38 mkArrayKeyFirst
    function mkArrayKeyFirst($string){
        foreach($string as $key => $value)
            return $key ;
    }

//#39 mkArrayValueFirst
    function mkArrayValueFirst($string){
        foreach($string as $key => $value)
            return $value ;
    }

//#40 mkArrayComp
    function mkArrayComp($arr1, $arr2){
        for($i=0; $i<my_count($arr1); $i++)
            if($arr1[$i] != $arr2[$i] ){
                return false;
            }

        return true ;
    }

//#41 mkSetType 
    function mkSetType(mixed &$var, string $type): bool{
        if($type=='integer' || $type=='int'){
            (int) $var ;
            return true;
        }
        else if($type=='float' || $type=='double'){
            (float) $var ;
            return true;
        }
        else if($type=='boolean' || $type=='bool'){
            (bool) $var ;
            return true;
        }
        else if($type=='string'){
            (string) $var ;
            return true;
        }
        else if($type=='array' ){
            (array) $var ;
            return true;
        }
        else if($type=='object'){
            (object) $var ;
            return true;
        }
        else if($type=='null'){
            $var=null ;
            return true;
        }
        else{
            return false;
        }
    } 

//#42 mkIsEmpty
    function mkIsEmpty(mixed $var): bool{
        if($var===null || $var==='')
            return true;
        return false;
    }

//#43 mkIsarray
    function mkIsarray( $array):bool{
        if($array === (array)$array)
            return true;
        return false;
    }

//#44 mkGetType
    function mkGetType(mixed $value): string{
        if($value === (int)$value)
            return "integer";
        elseif($value === (float)$value)
            return "double";
        elseif($value === (string)$value)
            return "string";
        elseif($value === (array)$value)
            return "array";
        elseif($value === (object)$value)
            return "object";
        elseif($value === (bool)$value)
            return "boolean";
        elseif($value === null)
            return null;
        return null;
    }

//#45 mkarrayAssocDiff
    function mkarrayAssocDiff(array $arr, array $array): array{
        $diff = [];
        foreach ($arr as $key => $value) {
            $found = false;
            foreach ($array as $k => $v) {
                if ($key === $k && $value === $v) {
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $diff[$key] = $value;
            }
        }
        return $diff;
    }

//#46 mkArrayDiffKey
    function mkArrayDiffKey(array $arr, array $array): array{
        $diff = [];
        foreach ($arr as $key => $value) {
            $found = false;
            foreach ($array as $k => $v) {
                if ($key === $k) {
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $diff[$key] = $value;
            }
        }
        return $diff;
    }

//#47 mkIsBool
    function mkIsBool($value):bool{
        if($value === true || $value === false)
            return true;

        return false;
    }

//#48 mkArrayFlip
    function mkArrayFlip(array $array): array{
        $newarr=[];
        foreach($array as $key => $value)
            $newarr[$value] = $key;
        return $newarr ;
    }

//#49 mkArrayCountValues
    function mkArrayCountValues(array $array): array{
        $newArr=[];
        foreach($array as $key => $value){
            $count=0;
            for($i=0; $i < my_count($array); $i++){
                if($value == $array[$i]){
                    $count++;
                }
            }
            $newArr[$value]=$count;
        }
        return $newArr;
    }

//#50 mkIsMorning
    function mkIsMorning(){
        $check = date('A');
        if($check == 'AM')
        return true;

    return false;
    }

//#51 mkAbs
    function mkAbs($number){
        if($number< 0 ){
            $number =($number)*-1;
            return $number; 
        }
        return $number; 
    }

//#52 mkpower
    function mkpower($number,$power){
        $result=1;
        for($i=1;$i<=$power;$i++){
            $result *= $number;
        } return $result;
    }

//#53 mksquar
    function mksquar($number){
         return $number * $number;
    }

//#54 mkcubic
    function mkcubic($number){
       return $number*$number*$number;
    }

//#55 mkSquarroot
    function mkSquarroot($number){
        for($i=0;$i<$number;$i++){
            if($i*$i==$number)
            return $i; 
        }
        return -1;
    }

//#56 mkCubicroot
    function mkCubicroot($number){
        for($i=0;$i<$number;$i++){
            if($i*$i*$i==$number)
            return $i; 
        }
        return -1;
    }

//#57 mkFactorial
    function mkFactorial($number){ 
        $factor=1;
        for($i= $number;$i>0;$i--){ 
            $factor = $factor * $i;   
        }
        return $factor;
    }

//#58 mkArraySum
    function mkArraySum(array $numbers){
        $result=1;
        for($i=0;$i<mkCount($numbers);$i++){
            $result += $numbers[$i];
        }
        return $result;
    }

//#59 mkArraySum
    function mkArrayMultiply(array $numbers){
        $result=1;
        for($i=0;$i<mkCount($numbers);$i++){
            $result *= $numbers[$i];
        }
        return $result;
    }

//#60 mkArrayAvg
    function mkArrayAvg(array $numbers){
        $result=1;
        for($i=0;$i<mkCount($numbers);$i++){
            $result += $numbers[$i];
        }
        return $result/mkCount($numbers);
    }

//#61 mkSwap
    function mkSwap(&$valu1,&$valu2){    
        $temp=$valu1;
        $valu1=$valu2;
        $valu2=$temp;
    }

//#62 mkArraySort
    function mkArraySort(array &$numbers){
        for($i=0;$i<mkCount($numbers);$i++){
            for($j=$i+1;$j<mkCount($numbers);$j++){
                if($numbers[$j]==$numbers[$i])continue;
                if($numbers[$j]>$numbers[$i]){
                    mkSwap($numbers[$j],$numbers[$i]);
                }
            }
        }
        return $numbers;
    }

//#63 mkArraySortDeced
    function mkArraySortDeced(array &$numbers){
        for($i=0;$i<mkCount($numbers);$i++){
            for($j=$i+1;$j<mkCount($numbers);$j++){
                if($numbers[$j]==$numbers[$i])continue;
                if($numbers[$j]<$numbers[$i]){
                    mkSwap($numbers[$j],$numbers[$i]);
                }
            }
        }
        return $numbers;
    }

//#64 mkFind
    function mkFind(array $numbers,$target){
        for($i=0;$i<mkCount($numbers);$i++){
            if($numbers[$i]==$target){  
                return $i;
            }
        }  
        return -1;
    }

//#65 mkMax
    function mkMax(array $numbers){
        $maxnum=$numbers[0];
        for($i=1;$i<mkCount($numbers);$i++){
            if($numbers[$i] > $maxnum){
                $maxnum=$numbers[$i];
            }
        }
        return $maxnum;
    }

//#66 mkMin
    function mkMin(array $numbers){
        $minnum=$numbers[0];
        for($i=1;$i<mkCount($numbers);$i++){
            if($numbers[$i] < $minnum){
                $minnum=$numbers[$i];
            }
        }
        return $minnum;
    }

//#67 mkPercentage
    function mkPercentage($totalVal,$countVal){
        return ($countVal/$totalVal)*100;
    }

//#68 mkProportionality 
    function mkProportionality($totalVal,$countVal,$percent){
        return ($countVal/$totalVal)*$percent;
    }

//#69 mkMode
    function mkMode($num1,$num2){
        if($num1==$num2)return 0;
        if($num1<$num2)return $num1;
        for($i=1;true;$i++){
            if($i*$num2>=$num1){
                if($i*$num2==$num1) return 0;
                else return $num1-(($i-1)*$num2);
            }
        }
    }

//#70 mkGetLast
    function mkGetLastNum($num,$count){
        $start=mkLength(strval($num))-$count;  
        $result=mkSubstring(strval($num),mkLength(strval($num))-$count,mkLength(strval($num))-1); 
        return intval($result);  
    }

//#71 mkGetFirst
    function mkGetFirstNum($num,$count){
        $result=mkSubstring(strval($num),0,$count-1); 
        return intval($result);   
    }

//#72 mkGetYear
   function mkGetYear($date){
    if(strpos($date,'/'))
       $newDate = explode('/',$date);
   else if(strpos($date,'-'))
       $newDate = explode('-',$date);
   else if(strpos($date,' '))
       $newDate = explode(' ',$date);
   
       return $newDate[0];
   }

//#73 mkGetMonth
   function mkGetMonth($date){
        if(strpos($date,'/'))
        $newDate = explode('/',$date);
        else if(strpos($date,'-'))
        $newDate = explode('-',$date);
        else if(strpos($date,' '))
        $newDate = explode(' ',$date);

        return $newDate[1];
   }
   
//#74 mkGetDay
   function mkGetDay($date){
        if(strpos($date,'/'))
        $newDate = explode('/',$date);
        else if(strpos($date,'-'))
        $newDate = explode('-',$date);
        else if(strpos($date,' '))
        $newDate = explode(' ',$date);

        return $newDate[2];
   }

//#75 mkJoin
   function mkJoin($arr, $seprator=""):string {
        $newString="";
        foreach($arr as $array){
            $newString .=$array;
            if(!($arr[arr_length($arr)] === $array))
                $newString .=$seprator;
        }
        return $newString;
    }

//#76 mkUCFirstWord
    function mkUCFirstWord($string, $separetor=" "):string{
        $count = 1;
        $string[0]=toUpper($string[0]);
        for ($i=0 ; $i< length($string) ; $i++ ){
            if($string[$i]== $separetor){
                if($i+1 != length($string) && $string[$i+1] != $separetor )
                    $string[$i+1]=toUpper($string[$i+1]);     
            }
        }

        return $string;
    }

//#77 mkLCFirstWord
    function mkLCFirstWord($string, $separetor=" "):string{
        $count = 1;
        $string[0]=toLower($string[0]);
        for ($i=0 ; $i< length($string) ; $i++ ){
            if($string[$i]== $separetor){
                if($i+1 != length($string) && $string[$i+1] != $separetor )
                    $string[$i+1]=toLower($string[$i+1]);     
            }
        }

        return $string;
    }

//#78 mkStringPad
    function mkStringPad($string, $length , $pad=" ",$pad_dir=1 ){
        if(length($string) < $length){
            if($pad_dir==1){
                for($i= length($string); $i<$length; $i++){
                    $string .= $pad;
                }
            }
            else if($pad_dir==0){
                $temp = $string;
                $string = "";
                for($i= 0 ; $i < $length - length($temp); $i++){
                    $string .= $pad;
                }
                $string .= $temp;
            }
            else if($pad_dir==2){
                $temp = $string;
                $string = "";
                for($i= 0 ; $i < (int)(($length - length($temp))/2) ; $i++){
                    $string .= $pad;
                }
                $string .= $temp;
                for($i= 0 ; $i < ($length - length($temp))/2 ; $i++){
                    $string .= $pad;
                }
            }
            return $string;
            
        }else{
            return $string ;
        }
        
    }

//#79 mkStrRepeat
    function mkStrRepeat($string , $times=1):string {
        $newString = "";
        for($i=0; $i < $times; $i++)
            $newString .= $string;

            return $newString ;
    }

//#80 mkIsNan
    function mkIsNan($value):bool {
        $value = +$value;
        if(gettype($value) == 'float'|| gettype($value) == 'double' || gettype($value) == 'integer' )
            return false;

        return true ;
    }

//#81 mkArrayKeys
    function mkArrayKeys($arr):array{
        $newArr=[];
        $i=0;
        foreach($arr as $key => $value){
            $newArr[$i] =$key;
            $i++;
        }
        return $newArr;
    }

//#82 mkArrayPush
    function mkArrayPush(&$arr,...$value){
        $count = func_num_args() - 1;
        // echo "$i : $j : ".func_get_arg($j)." ";
        for($i=1; $i <= $count; $i++){
            echo"<br>".func_get_arg($i);
            $arr[]=func_get_arg($i);
        }
        return $arr;
    }

//#83 mkArrayShift
    function mkArrayShift(array &$arr){
        $newarray=[];
        $shifVal[]=$arr[0];
        for($i=1; $i<length($arr); $i++){
            $newarray[]=$arr[$i];
        }
        $arr = $newarray;
        return $shifVal ;
    } 

//#84 mkArrayKshift
    function mkArrayKshift(array &$arr):array{
        $shiftVal=0;
        $newarr=[];
    
        foreach( $arr as $key => $value){
            if($shiftVal===0)
                $shiftVal=[$key => $value];
    
            else
                $newarr +=[$key => $value];
        }
        $arr = $newarr;
        return $shiftVal ;
    }
    
//#85 mkArrayUnshift
    function mkArrayUnshift(array &$arr,$value):array{
        $newarr =[0 => $value];
        $unshiftVal=$newarr;
        for($i=0; $i < length($arr); $i++)
            $newarr[$i+1]= $arr[$i];
        
        $arr = $newarr;
        return $unshiftVal ;
    }

//#86 mkArrayFill
    function mkArrayFill(int $start, int $count, mixed $value):array{
        for($i=$start; $i < $start+$count; $i++)
            $arr[$i]=$value;
        return $arr;
    }
    
//#87 mkArrayFillKeys
    function mkArrayFillKeys(array $keys, mixed $value): array{
        foreach($keys as $key)
            $arr[$key]=$value;
        return $arr ;
    }

//#88 mkArrayCombine
    function mkArrayCombine(array $keys, array $values): array{
        for($i=0; $i<length($keys); $i++)
            $arr[$keys[$i]] = $values[$i];

        return $arr ;
    }

//#89 mkArrayValues
    function mkArrayValues(array $array): array{
        foreach($array as $value)
            $newArr[]=$value;

        return $newArr ;
    }

//#90 mkArrayKeyLast
    function mkArrayKeyLast(array $array): int|string|null{
        foreach($array as $key => $value)
                $target=$key;
        return $target ;
    }

//#91 mkArrayKeyExists
    function mkArrayKeyExists(string|int $key, array $array): bool{
        foreach($array as $_key => $value){
            if($_key === $key)
                return true;
        }
        return false;
    }

//#92 mkArrayMerge
    function mkArrayMerge(array ...$arrays): array{
        $newarr=[];
        for($i=0; $i < func_num_args(); $i++){
            foreach(func_get_arg($i) as $key => $value){
                if(gettype($key) == 'integer') 
                    $newarr[]=$value;

                $newarr +=[$key => $value];
            }
        }
        return $newarr;
    }

//#93 mkIsInt
    function mkIsInt($value):bool{
        function check_digit_int($value){
            if($value >= 10)
                $temp = (int)($value /10);
            else
                $temp = $value ; 

            $temp = _ascci($temp);
            $value= $value % 10;
            if($temp >= 48 && $temp <= 57)
                return $value;
        }

        if($value === (int)$value ){

            if($value >1000 && $value <= 10000)
            $value = check_digit_int($value);
            if($value >100 && $value <= 1000)
                $value = check_digit_int($value);
            if($value >10 && $value <= 100)
                $value = check_digit_int($value);
            if($value <= 10){
                $value = check_digit_int($value);
                return true ;
            }

        }
        return false ;
    }

//#94 mkIsFloat
    function mkIsFloat($value):bool{

        function check_digit_float($value){
            if($value >= 10)
                $temp = (int)($value /10);
            else
                $temp = $value ; 

            $temp = _ascci($temp);
            $value= $value % 10;
            if($temp >= 48 && $temp <= 57)
                return $value;
        }

        if(!is_numeric($value))
            return false ;

        if($value === +$value && $value > (int)$value){

            if($value >1000 && $value <= 10000)
            $value = check_digit_float($value);
            if($value >100 && $value <= 1000)
                $value = check_digit_float($value);
            if($value >10 && $value <= 100)
                $value = check_digit_float($value);
            if($value <= 10){
                $value = check_digit_float($value);
                return true ;
            }
        }
        return false ;
    }

//#95 mkArrayChunk
    function mkArrayChunk(array $array, int $length, bool $preserve_keys = false): array{
        $newArr=[];
        $subArr=[];
        $k=0;
        if($preserve_keys == false){
            for($i=0; $i< arr_length($array); $i+=$length){
            
                for($j=0; $j<$length; $j++){
                    if($k == arr_length($array) )
                        continue;
                    $subArr +=[$j => $array[$k]];
                    $k++;
                }
        
                $newArr[]=$subArr;
                $subArr =[];
                    
            }
        }
        else if($preserve_keys == true){
            for($i=0; $i< arr_length($array); ){
        
                for($j=0; $j<$length; $j++){
                    if($i <= arr_length($array)-1 ){
                        $subArr +=[$i => $array[$k]];
                        $i++;
                        $k++;
                    }
                }

                $newArr[]=$subArr;
                $subArr =[];
            }
        }
        
        return $newArr ;
    }

//#96 mkArrayColumn
    function mkArrayColumn(array $array, int|string|null $column_key, int|string|null $index_key = null): array{
        $newArr=[];
        $newvalue=[];
        $newKey=[];
        for($i=0; $i<arr_length($array); $i++){
            $newvalue +=$array[$i][$column_key];
        }

        if($index_key != null){
            for($i=0; $i<arr_length($array); $i++){
                $newKey +=$array[$i][$index_key];
            }
            for($i=0; $i<arr_length($array); $i++){
                $newArr +=[$newKey[$i] => $newvalue[$i]];
            }
            return $newArr ;
        }

        return $newvalue;
    }

//#97 mkArrayReverse
    function mkArrayReverse(array $array, bool $preserve_keys = false): array{
        $newArr=[];
        $help = arr_length($array)-1;
        if($preserve_keys == false){
            for($i=0; $i < arr_length($array); $i++){
                $newArr[$i]=$array[$help - $i];
            }
            return $newArr;
        }else{
            $newvalue=[];
            $newkey=[];
            foreach($array as $key => $value ){
                $newvalue +=[$value];
                $newkey +=[$key];
            }
            for($i=arr_length($newvalue)-1; $i>=0;$i--){
                $newArr[$newkey[$i]]=$newvalue[$i];
            }
            return $newArr;
        }

    }

//#98 mkStrDecrement
    function mkStrDecrement(string $value){
        if($value[length($value)-1] === "A" || $value[length($value)-1 ] == 'A'){
            $str=_ascci($value[length($value)-2]) ;
            $str-- ;
            $value[length($value)-2]=char($str) ;
            return $value ;
        }
        else{
            $str=_ascci($value[length($value)-1]) ;
            $str-- ;
            $value[length($value)-1]=char($str) ;
            return $value ;
        }
    }

//#99 mkArrayMap
    function mkArrayMap(?callable $callback, array $array):array{
        $result =[];
        foreach($array as $key => $value){
            $result[$key] = $callback($value);
        }
        return $result;
    }

//#100 mkArrayFilter
    function mkArrayFilter(array $array, ?callable $callback = null, int $mode = 0): array{
        $result =[];
        $test='';
        foreach($array as $key => $value){
            $test = $callback($value);
            if($test){
                $result[$key] = $value;
            }
        }
        return $result;
    } 


?>
