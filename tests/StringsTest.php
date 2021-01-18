<?php

use PHPUnit\Framework\TestCase;

class StringsTest extends TestCase
{
    /**
     * @see https://www.php.net/manual/en/language.types.string.php
     */
    public function testVariableParsing()
    {
        $foo = 'world';

        // Double quotes.
        $this->assertEquals('Hello world', "Hello $foo");

        // Single quotes.
        $this->assertEquals('Hello $foo', 'Hello $foo');

        // TODO "Hello ${foo}"
        $this->assertEquals('Hello world', "Hello ${foo}");


        // TODO "Hello " . $foo
        $this->assertEquals('Hello world', "Hello " . $foo);

        // TODO Heredoc
        $heredoc_string = <<<EOT
Hello $foo
EOT;
        $this->assertEquals('Hello world', $heredoc_string);


        // TODO Nowdoc
        $nowdoc_string = <<<'EOT'
Hello $foo
EOT;
        $this->assertEquals('Hello $foo', $nowdoc_string);
    }

    /**
     * @see https://www.php.net/manual/en/ref.strings.php
     */
    public function testStringFunctions()
    {
        // trim — Strip whitespace (or other characters) from the beginning and end of a string
        $this->assertEquals('Hello', trim('Hello         '));
        $this->assertEquals('Hello', trim('Hello......', '.'));

        // ltrim — Strip whitespace (or other characters) from the beginning of a string
        // TODO to be implemented
        $this->assertEquals('Hello', ltrim('    Hello'));
        $this->assertEquals('Hello', ltrim('....Hello', '.'));

        // rtrim — Strip whitespace (or other characters) from the end of a string
        // TODO to be implemented
        $this->assertEquals('Hello', rtrim('Hello    '));
        $this->assertEquals('Hello', rtrim('Hello,,,,,,', ','));

        // strtoupper — Make a string uppercase
        $this->assertEquals('HELLO', strtoupper('hello'));

        // strtolower — Make a string lowercase
        $this->assertEquals('hello', strtolower('HeLlO'));

        // ucfirst — Make a string's first character uppercase
        // TODO to be implemented
        $this->assertEquals('Hello', ucfirst('hello'));

        // lcfirst — Make a string's first character lowercase
        // TODO to be implemented
        $this->assertEquals('hello', lcfirst('Hello'));

        // strip_tags — Strip HTML and PHP tags from a string
        // TODO to be implemented
        $str = '<h1>Hello world!</h1><p>Glad to see you</p>';
        $this->assertEquals('Hello world!Glad to see you', strip_tags($str));

        // htmlspecialchars — Convert special characters to HTML entities
        // TODO to be implemented
        $this->assertEquals('&lt;h1&gt;Hello world!&lt;/h1&gt;&lt;p&gt;Glad to see you&lt;/p&gt;', htmlspecialchars($str));

        // addslashes — Quote string with slashes
        // TODO to be implemented
        $this->assertEquals("five o\'clock tea", addslashes("five o'clock tea"));

        // strcmp — Binary safe string comparison
        // TODO to be implemented
        $this->assertEquals(0, strcmp("Hello", "Hello"));
        $this->assertEquals(6, strcmp("Hello world", "Hello"));
        $this->assertEquals(-6, strcmp("Hello", "Hello world"));

        // strncasecmp — Binary safe case-insensitive string comparison of the first n characters
        // TODO to be implemented
        $this->assertEquals(0, strncasecmp("HELLO", "Helloween", 5));
        $this->assertEquals(0, strncasecmp("Hello world", "Hello Bob", 6));
        $this->assertEquals(-1, strncasecmp("Hello A", "Hello B", 7));
        $this->assertEquals(2, strncasecmp("Hello C", "Hello A", 7));

        // str_replace — Replace all occurrences of the search string with the replacement string
        // TODO to be implemented
        $sentence = 'Add bacon to pizza. You will get tasty bacon pizza';
        $this->assertEquals("Add tomato to pizza. You will get tasty tomato pizza", str_replace("bacon","tomato",$sentence));

        // strpos — Find the position of the first occurrence of a substring in a string
        // TODO to be implemented
        $this->assertEquals(4, strpos($sentence,"bacon"));
        $this->assertEquals(false, strpos($sentence,"tomato"));

        // strstr — Find the first occurrence of a string
        // TODO to be implemented
        $this->assertEquals("bacon to pizza. You will get tasty bacon pizza", strstr($sentence,"bacon"));
        $this->assertEquals("Add ", strstr($sentence,"bacon",true));

        // strrchr — Find the last occurrence of a character in a string
        // TODO to be implemented
        $this->assertEquals('bacon pizza', strrchr($sentence,'bacon'));

        // substr — Return part of a string
        // TODO to be implemented
        $this->assertEquals('New', substr('I love New York',7,3));
        $this->assertEquals('York', substr('I love New York',-4));

        // sprintf — Return a formatted string
        // TODO to be implemented
        $string = 'I ordered %d %s pizzas on total sum %1.2f dollars.';
        $num = 3;
        $type = "bacon";
        $sum = 250.3;
        $this->assertEquals("I ordered 3 bacon pizzas on total sum 250.30 dollars.", sprintf($string, $num, $type, $sum));

    }
}