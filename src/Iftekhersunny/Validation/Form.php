<?php
/**
 * Form.php
 * @author      Iftekher Sunny <iftekhersunny@gmail.com>
 * @link        www.iftekhersunny.com
 * @version     1.0.0
 * Date: 1/20/2015
 * Time: 12:36 PM
 */

namespace Iftekhersunny\Validation;

use Illuminate\Validation\Factory as Validator;

/**
 * Class Form
 * @package Sunsoftbd
 */
abstract class Form {

    /**
     * @var Validator
     */
    protected $validator;

    /**
     * @var Validation
     */

    protected $validation;
    /**
     * @param Validator $validator
     */
    function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param array $formData
     *
     * @return bool
     * @throws FormValidationException
     */
    public function validate(array $formData)
    {
        $this->validation = $this->validator->make($formData, $this->getValidationRules());

        if ( $this->validation->fails())
        {
            throw new FormValidationException('Validation Failed.', $this->getValidationErrors());
        }

        return true;
    }

    /**
     * @return mixed
     */
    protected function getValidationRules()
    {
        return $this->rules;
    }

    /**
     * @return mixed
     */
    protected function getValidationErrors()
    {
        return $this->validation->errors();
    }



}