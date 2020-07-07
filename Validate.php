
<?php
class Validate{
    public $Error_MSG = "";
    
    function is_email($VAR){
        try{
            if ( preg_match("/\S@\S.*\..*|.*\..*\S@\S.*\..*/u",$VAR) == 0){
                return array(False,"Error invalid email address.");
            }else{
                return array(True,$VAR);
            }
        }
        catch (Exception $e){
            return array( False,"Error invalid email address.");
        }
    }
    function is_length($VAR,$min,$max){
        try{
            if(  strlen($VAR) < $min ||  strlen($VAR) > $max){
                return array(False,"Error Please enter between $min and $max characters");
            }else{
                return array( True,$VAR);
                }
            }
        catch (Exception $e){
            return array( False,"Error Please enter between $min and $max characters");
        }
    }            
    function is_bool($VAR){
        try{
            if( is_bool($VAR)){
                return array( True,$VAR);
            }else{
                return array( False,"Error value must be True || False.");
            }
        }catch(Exception $e){
            return array( False,"Error value must be True || False.");
        }
    }
    function is_address($VAR){
        $Error = "Not a valid address.";
        try{
            if(preg_match("/\d*.*\d{5}|\d*.*\d{5}-\d{4}/u",$VAR)  == 0){
                return array( False,$Error);
            }elseif(preg_match("/[Pp][Oo].*\d{5}|[Pp][Oo].*\d{5}-\d{4}/u",$VAR) == 0){
                return array( False,$Error);            
            }else{
                return array( True,$VAR);
            }
        }catch (Exception $e){
            return array( False,$Error);            

    }}function is_phone($VAR){
        $Error = "Not a valid phone number.";
        try{
            if(preg_match("/^\d{9,10}|^\d{3}[-\s]\d{3}-\d{4}|^\d-\d{3}[-\s]\d{3}-\d{4}|^\(\d{3}\)[-\s]\d{3}-\d{4}|^\d-\(\d{3}\)[-\s]\d{3}-\d{4}|^\(\d{3}\)\d{3}-\d{4}|^\d-\(\d{3}\)\d{3}-\d{4}/u",$VAR) == 0){
                return array( False,$Error); 
            }else{          
                return array( True,$VAR);
            }
        }catch (Exception $e){
            return array( False,$Error);     

    }}function is_letter($VAR){
        $Error = "The value entered must only contain letters.";
        try{
            $VAR=strval($VAR);
            if(  strlen($VAR)  == 0){
                return array( False,$Error);
            }
            elseif( preg_match("/\d/u",$VAR) > 0){
                return array( False,$Error);
            }
            elseif(is_string($VAR)){
                    return array( True,$VAR);
            }
            else{
                return array( False,$Error);
                }           
        }
        catch (Exception $e){
            return array( False,$Error);            
        }

    }function is_alphanum($VAR){
        $Error = "The value entered can only be Alpha Numeric";
        if(is_string($VAR)){
            return array( True,$VAR);
        }else{
            return array( False,$Error);   

    }}function is_digits($VAR){
        $Error = "The value entered can only contain numbers";
        if(is_float($VAR)){
            return array( True,$VAR);       
        }else{
            return array( False,$Error);             
        }
    }function is_special($VAR){
        $Error = "The Value contains special || control characters";
        try{
            if(0==1){
                return array( False,$Error);
            }else{
                return array( True,$VAR);
        }}catch (Exception $e){
            return array( False,$Error);                        
        
    
    }}function is_date($VAR){
        $Error = "The value must be a date in DD/MM/YYYY format.";
        # try{
        strval($VAR);
        if(preg_match("/^\d{2}[\/\.-]\d{2}[\/\.-]\d{4}$/u",$VAR) == 0){
            return array( False,$Error);
        }else{
            return array( True,$VAR);
        # }}catch (Exception $e){
        #     return array( False,$Error);            

    }}function is_intval($VAR){
        $Error = "The value must be an whole number.";
        try{
            intval($VAR);
            return array( True,$VAR);
        }catch (Exception $e){
            return array( False,$Error);
        
    
    }}function is_str($VAR){
        $Error = "The Value must be text.";
        try{
            strval($VAR);
            return array( True,$VAR);
        }catch (Exception $e){
            return array( False,$Error);
    
    }}function is_creditcard($VAR){
        $Error = "This is not a valid Credit Card numbe";
        try{
            strval($VAR);
            if(preg_match("/\d{16}$|\d{12}$/u",$VAR) == 0){
                return array( False,$Error);
            }else{
                return array( True,$VAR);
        }}catch (Exception $e){
            return array( False,$Error);            
    
    }}function is_cvc($VAR){
        $Error = "This is not a valid CVC";
        try{
            strval($VAR);
            if( preg_match("/^\d{3}$|^\d{4}$/u",$VAR) == 0){
                return array( False,$Error);
            }else{
                return array( True,$VAR);
        }}catch (Exception $e){
            return array( False,$Error);            
    
    }}function is_MM($VAR){
        $Error = "This is not a valid Month, Please enter in MM format.";
        try{
            strval($VAR);
            if(preg_match("/^[1-9]|^0[1-9]|^1[0 1 2]/u",$VAR)){
                return array( True,$VAR);
            }else{
                return array( False,$Error);
        }}catch (Exception $e){
            return array( False,$Error); 

    }}function is_YYYY($VAR){
        $Error = "This is not a valid Year, Please enter in YYYY format.";
        try{
            strval($VAR);
            if( preg_match("/^\d{4}$/u",$VAR) == 0){
                return array( False,$Error);
            }else{
                return array( True,$VAR);
        }}catch (Exception $e){
            return array( False,$Error);

    }}function is_bad_sql($VAR){
        $Error = "Detected invalid data. Please check your entry.";
        try{
            $tVAR = $VAR;
            strval($tVAR);
            if( preg_match("/;|[Dd][Ee][Ll][Ee][Tt][Ee]\s[Tt][Aa][Bb][Ll][Ee]|[Aa][Ll][Tt][Ee][Rr]\s[Tt][Aa][Bb][Ll][Ee]|[Dd][Rr][Oo][Pp]\s[Tt][Aa][Bb][Ll][Ee]|[Cc][Rr][Ee][Aa][Tt][Ee]\s[Tt][Aa][Bb][Ll][Ee]|[Ss][Ee][Ll][Ee][Cc][Tt]\s\*\s[Ff][Rr][Oo][Mm]|[Uu][Pp][Dd][Aa][Tt][Ee]\s.*[Ss][Ee][Tt]/u",$tVAR) > 0){
                return array( False,$Error);
            }else{
                return array( True,$VAR);
        }}catch (Exception $e){
            return array( False,$Error);
        }
    }
}
?>