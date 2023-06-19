<?php

//Test 4
class Thesaurus
{
    private $thesaurus;

    function __construct(array $thesaurus)
    {
        $this->thesaurus = $thesaurus;
    }

    public function getSynonyms(string $word) : string
    {
        
        return (array_key_exists($word, $this->thesaurus)) ? '{"word":'.json_encode($word).',"synonyms":'.json_encode($this->thesaurus[$word]).'}' : '{"word":'.json_encode($word).',"synonyms":[]}';
    }
}

$thesaurus = new Thesaurus(
    [
        "small" => array("little", "compact"),
        "market" => array("trade"),
        "asleast" => array()

    ]
);

echo $thesaurus->getSynonyms("small");
echo "\n";
echo $thesaurus->getSynonyms("market");
echo "\n";
echo $thesaurus->getSynonyms("asleast");