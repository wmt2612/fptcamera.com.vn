<?php
namespace Themes\Anan\Http\Rules;

use Illuminate\Contracts\Validation\Rule;

class MinWordsRule implements Rule
{

    private $min_words;

    /**
     * Create a new rule instance.
     * @param integer $max_words
     *
     * @return void
     */
    public function __construct($min_words = 1)
    {
        $this->min_words = $min_words;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return str_word_count($value) >= $this->min_words;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('anan::anan.error.name.min_word');
    }
}
