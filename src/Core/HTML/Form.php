<?php namespace Core\HTML;

class Form 
{

    public function __construct()
    {
        $token = uniqid();
        $_SESSION['token'] = $token;
        echo '<input type="hidden" name="token" value="' . $token . '" >';
    }
    public $surround = 'field';
    public function input(string $name,  string $type='text', string $label = null)
    {

        $label = is_null($label) ? ucfirst($name) : ucfirst($label);
        $input = <<< "EOF"
        <div class="$this->surround">
            <label for="$label">$label</label><br>    
            <input name="$name" id="$label" type="$type">
        </div>

        EOF;

        echo $input;
    }


    public function textarea(string $name, string $label = null)
    {
        $label = is_null($label) ? ucfirst($name) : ucfirst($label);
        $textarea = <<< "EOF"
        <div class="$this->surround">
            <label for="$label">$label</label><br>    
            <textarea name="$name" id="$label"></textarea>
        </div>

        EOF;

        echo $textarea;
    }

    public function submit($value = 'Envoyer')
    {
        echo '<button class="btn">' . $value . '</button>';

        dump($_SESSION['token']);
    }
}