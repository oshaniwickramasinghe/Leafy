<?php



class User extends Model
{
    
    public $errors = [];
    protected $table = "user";

    protected $arr = [
        'fname',
        'lname',
        'email',
        'password',
        'role',
        'code',
        
    ];
    


 //validate function to be accessible from outside the class
   public  function validate($data)
   {

   
    $this->errors =[];
    //$_Post is the data
     if (empty($data['fname']))
     {
       $this->errors['fname'] = 'A first name is required';
     }
     if (empty($data['lname']))
     {
       $this->errors['lname'] = 'A last name is required';
     }

     //checking if already existing email
     

     if (!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
     {
       $this->errors['email'] = 'Email is not valid';
     }else if($this->where(['email' =>$data['email']])){
         $this->errors['email'] = 'Email already exists';
      }
     


     if (empty($data['password']))
     {
       $this->errors['password'] = 'A password is required';
     }
     if ($data['password'] !== $data['cpassword'])
     {
       $this->errors['password'] = 'Passwords do not matched';
     }
    
   if(empty($this->errors))
   {
       return true;
   }
        return false;
    }
    
  }