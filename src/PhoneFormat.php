<?php

class PhoneFormat {

    public $clean;
    public $dashes;
    public $brackets;
    public $brackets_alt;
    public $spaces;
    public $dots;
    public $with_code_plus;
    public $with_code_no_plus;

    public $string;
    public $array = [];

    public $error = false;

    public $valid = false;

    function __construct($phone) {
        $this->clean($phone);
        $this->format();
    }

    private function clean($phone) {
        $this->string = (string) preg_replace('/\D/', '', $phone);
        $this->array = str_split($this->string);
        if($this->array[0] == '1' || $this->array[0] == 1) {
            $array = $this->array;
            array_shift($array); // Remove index 0
            $this->array = array_values($array); // Re-index the array.
        }

        $this->is_valid();
    }

    private function is_valid() {
        $count = count($this->array);
        if($count == 10) {
            $this->valid = true;
        }

        if($this->valid == false) {
            $this->error = [
                'Phone numbers must be 10 characters.',
                'Not a valid US phone number.',
            ];
        }
    }

    private function format() {
        if(count($this->array) == 10) {
            $string = implode('', $this->array);
            $this->string = $string;
            $block1 = substr($string, 0, 3);
            $block2 = substr($string, 3, 3);
            $block3 = substr($string, 6);

            $this->clean             = (int) $this->string;
            $this->dashes            = "$block1-$block2-$block3";
            $this->brackets          = "($block1) $block2-$block3";
            $this->brackets_alt      = "($block1) $block2 - $block3";
            $this->spaces            = "$block1 $block2 $block3";
            $this->dots              = "$block1.$block2.$block3";
            $this->with_code_plus    = "$phone->1$string";
            $this->with_code_no_plus = "1$string";
        }
    }
}

