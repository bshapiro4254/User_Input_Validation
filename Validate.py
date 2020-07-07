import re, json, os, sys
from string import printable


class Validate():
    def __init__(self):
        self.Error_MSG = ''
    
    def is_email(self,VAR):
        try:
            if len([''.join(x) for x in re.findall(r'\w@\w.*\..*|.*\..*\w@\w.*\..*',VAR)]) == 0:
                return [False,'Error invalid email address.']
            else:
                return [True,VAR]
        except:
            return [False,'Error invalid email address.']
    
    def is_length(self,VAR,min,max):
        try:
            if len(VAR) < min or len(VAR) > max:
                return [False, 'Error Please enter between {} and {} characters'.format(min,max)]
            else:
                return [True,VAR]
        except:
            return [False,'Error Please enter between {} and {} characters'.format(min,max)]

    def is_bool(self,VAR):
        try:
            bool(VAR)
            return [True,VAR]
        except:
            return [False,'Error value must be True or False.']
    
    def is_address(self,VAR):
        Error = 'Not a valid address.'
        try:
            if len(VAR) == 0:
                return [False,Error]
            elif len(re.findall(r'^\d',VAR)) == 0:
                return [False,Error]
            elif len(re.findall(r'\d$',VAR)) == 0:
                return [False,Error]            
            else:
                return [True,VAR]  
        except:
            return [False,Error]            

    def is_phone(self,VAR):
        Error = 'Not a valid phone number.'
        try:
            if len(VAR) == 0:
                return [False,Error]
            elif len([''.join(x) for x in re.findall(r'^\d{9,10}|^\d{3}-\d{3}-\d{4}|^\d-\d{3}-\d{3}-\d{4}',VAR)]) == 0:
                return [False,Error] 
            else:           
                return [True,VAR]  
        except:
            return [False,Error]     

    def is_letter(self,VAR):
        Error = 'The value entered must only contain only letters.'
        try:
            if len(VAR) == 0:
                return [False,Error]
            if len(re.findall(r'\d',VAR) > 0):
                return [False,Error]
            else:
                try:
                    VAR = str(VAR)
                    return [True,VAR]  
                except:
                    return [False,Error]             
        except:
            return [False,Error]            
        
    def is_alphanum(self,VAR):
        Error = 'The value entered can only be Alpha Numeric'
        try:
            VAR = str(VAR)
            return [True,VAR]  
        except:
            return [False,Error]   

    def is_digits(self,VAR):
        Error = 'The value entered can only contain numbers'
        try:
            float(VAR)
            return [True,VAR]         
        except:
            return [False,Error]             

    def is_special(self,VAR):
        Error = 'The Value contains special or control characters'
        try:
            if set(VAR).difference(printable):
                return [False,Error]
            else:
                return [True,VAR]
        except:
            return [False,Error]                        
        
    
    def is_date(self,VAR):
        Error = 'The value must be a date in DD/MM/YYYY format.'
        # try:
        VAR = str(VAR)
        if len([''.join(x) for x in re.findall(r'^\d{2}(/|\.|-)\d{2}(/|\.|-)\d{4}$',VAR)]) == 0:
            return [False,Error]
        else:
            return [True,VAR]
        # except:
        #     return [False,Error]            

    def is_int(self,VAR):
        Error = 'The value must be an whole number.'
        try:
            int(VAR)
            return [True,VAR]
        except:
            return [False,Error]
        
    
    def is_str(self,VAR):
        Error = 'The Value must be text.'
        try:
            VAR = str(VAR)
            return [True,VAR]
        except:
            return [False,Error]
    
    def is_creditcard(self,VAR):
        Error = 'This is not a valid Credit Card number'
        try:
            VAR = str(VAR)
            if len([''.join(x) for x in re.findall(r'\d{16}$|\d{12}$',VAR)]) == 0:
                return [False,Error]
            else:
                return [True,VAR]
        except:
            return [False,Error]            
    
    def is_cvc(self,VAR):
        Error = 'This is not a valid CVC'
        try:
            VAR = str(VAR)
            if len([''.join(x) for x in re.findall(r'^\d{3}$|^\d{4}$',VAR)]) == 0:
                return [False,Error]
            else:
                return [True,VAR]
        except:
            return [False,Error]            
    
    def is_MM(self,VAR):
        Error = 'This is not a valid Month, Please enter in MM format.'
        try:
            VAR = str(VAR)
            if len([''.join(x) for x in re.findall(r'^0[1-9]|^1[0 1 2]$',VAR)]) == 0:
                return [False,Error]
            else:
                return [True,VAR]
        except:
            return [False,Error] 

    def is_YYYY(self,VAR):
        Error = 'This is not a valid Year, Please enter in YYYY format.'
        try:
            VAR = str(VAR)
            if len([''.join(x) for x in re.findall(r'^\d{4}$',VAR)]) == 0:
                return [False,Error]
            else:
                return [True,VAR]
        except:
            return [False,Error]

    def is_bad_sql(self,VAR):
        Error = 'Detected invalid data. Please check your entry.'
        try:
            VAR = str(VAR)
            if len(re.findall(r';|[Dd][Ee][Ll][Ee][Tt][Ee]\s[Tt][Aa][Bb][Ll][Ee]|[Aa][Ll][Tt][Ee][Rr]\s[Tt][Aa][Bb][Ll][Ee]|[Dd][Rr][Oo][Pp]\s[Tt][Aa][Bb][Ll][Ee]|[Cc][Rr][Ee][Aa][Tt][Ee]\s[Tt][Aa][Bb][Ll][Ee]|[Ss][Ee][Ll][Ee][Cc][Tt]\s\*\s[Ff][Rr][Oo][Mm]|[Uu][Pp][Dd][Aa][Tt][Ee]\s.*[Ss][Ee][Tt]',VAR)) > 0:
                return [False,Error]
            else:
                return [True,VAR]
        except:
            return [False,Error]