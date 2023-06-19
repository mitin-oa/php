<?php
    //Task_3
    class LeagueTable
    {
        public function __construct($players)
        {
            @$this->standings = array();
            foreach($players as $index => $p)
            {
                $this->standings[$p] = array
                (
                    'index' => $index,
                    'games_played' => 0, 
                    'score' => 0
                );
            }
        }

    public function recordResult($player, $score)
    {
        @$this->standings[$player]['games_played']++;
        @$this->standings[$player]['score'] += $score;
    }


    public function playerRank()
    {
        $data = @$this->standings;


        array_multisort(array_column($data, 'score'),  SORT_DESC,
                array_column($data, 'games_played'), SORT_ASC,
                array_column($data, 'index'), SORT_ASC,
                $data);

        print_r($data);
    }
}

$table = new LeagueTable(array('John', 'Max', 'Monika'));
$table->recordResult('John', 2);
$table->recordResult('Max', 3);
$table->recordResult('Monika', 5);
echo $table->playerRank(1);