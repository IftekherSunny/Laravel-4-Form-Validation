<?php
/**
 * FormValidationException.php
 * @author      Iftekher Sunny <iftekhersunny@gmail.com>
 * @link        www.iftekhersunny.com
 * @version     1.0.0
 * Date: 1/20/2015
 * Time: 12:55 PM
 */

namespace Iftekhersunny\Validation;
use Illuminate\Support\MessageBag;

class FormValidationException  extends  \Exception{

    /**
     * @var errors
     */
    protected  $errors;

    /**
     * @param string     $message
     * @param MessageBag $error
     */
    function __construct($message, MessageBag $error)
    {
        $this->errors = $error;
        
        parent::__construct($message);
    }

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }


}