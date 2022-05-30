<?php
//Script to build dynamic content in podz-docs.md

//Get all issues from the project
$url = 'https://api.github.com/repos/samuelroland/podz/issues?per_page=100&state=all&sort=updated';

$token = file_get_contents('token.bak');
$response = shell_exec('curl -u samuelroland:' . $token . ' -H "Accept: application/vnd.github.v3+json" "' . $url . '" -s');
$issues = json_decode($response);

date_default_timezone_set('Europe/Zurich');

$fieldsSorting = array_column($issues, 'closed_at');

function getSprintByDate($date)
{
    $sprints = [5 => '30.05-31.05', 4 => '23.05-27.05', 3 => '16.05-20.05', 2 => '09.05-13.05', 1 => '02.05-06.05'];
    $date = strtotime($date);
    foreach ($sprints as $index => $sprint) {
        if ($date >= strtotime(substr($sprint, 0, 5) . '.2022')) {
            return $index;
        }
    }
}

//Step 1: create the planifdata.json first version
array_multisort($fieldsSorting, SORT_ASC, $issues);
$newArray = [];

foreach ($issues as $issue) {
    $newArray[$issue->number] = [
        "estimated" => substr($issue->labels[0]->name, 2),
        "spent" => '',
        "name" => $issue->title,
        "sprint" => '1'
    ];
}

//file_put_contents('planifdata.json', json_encode($newArray));

//Step 2: generate initial planning
$localIssues = json_decode(file_get_contents('planifdata.json'));
ob_start();

echo "| ID | Sprint  | Titre      | Estimé  | \n";
echo "| ------ | --- | -----------| ---------- | \n";

foreach ($localIssues as $key => $issue) {
    echo "| <a href='https://github.com/samuelroland/podz/issues/" . $key . "'>#" . $key . "</a> | ";
    echo "S" . $issue->sprint . " | ";
    echo $issue->name . " | ";
    echo $issue->estimated . "h" . " | ";
    echo "\n";
}
echo "\n";
echo "\n";

$content = ob_get_clean();

echo $content;

file_put_contents('planification-initiale.md', $content);


//Step 3: generate final planning
ob_start();

echo "| ID | S-d | S-f | Titre      | Estimé | Passé | Delta | Fin | \n";
echo "| ------ | --- | --- | ------ | ------ | ----- | ----- | --- | \n";

foreach ($issues as $issue) {
    echo "| <a href='https://github.com/samuelroland/podz/issues/" . $issue->number . "'>#" . $issue->number . "</a> | ";
    echo "S" . $localIssues->{$issue->number}->sprint . " | ";
    echo ($issue->closed_at != null ? "S" . getSprintByDate($issue->closed_at) : '-') . " | ";
    echo $issue->title . " | ";
    echo substr($issue->labels[0]->name, 2) . "h" . " | ";
    echo $localIssues->{$issue->number}->spent . "h | ";
    echo (float)substr($issue->labels[0]->name, 2) - (float)$localIssues->{$issue->number}->spent . "h | ";
    echo ($issue->closed_at != null ? date("d.m.Y", strtotime($issue->closed_at))  : '-') . " | ";
    echo "\n";
}
echo "\n";
echo "\n";

$content = ob_get_clean();

echo $content;

file_put_contents('planification-finale.md', $content);
