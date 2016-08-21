<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Suur täht</title>
    <link href='http://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
    <style>
    body {
        font-family: 'Dancing Script', cursive;
    }
span {
    font-size: 3em;
    display: inline-block;
    text-align: center;
    width: 1em;
    font-weight: bold;
    float:left; /* et oleks teksti kõrval */
    clear: both; /* et iga paragrahv algaks oma realt */
}
#wrap {
    width: 800px;
    margin: auto;
}
    </style>
</head>
<body>
<div id="wrap">
    <h1>Some title</h1>
<?php
ini_set("display_errors", 1);

$text="Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat
Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

//print_r(explode("\n", $text)); //prindib array välja
$textParagraphs = explode("\n", $text);
foreach ($textParagraphs as $tP) { //teeb arrayks? massiiviks
  $tP = "<p><span>$tP[0]</p></span><p>$tP</p>"; //prindin stringi, mis võtab esitähe span ja paragrahvi vahele ja ülejäänud osa paragrahvi vahele.
  echo "$tP";
}

/* //prindib välja paragrahvid, aga mitte suurt tähte
function suurAlgus($text) {
  global $textParagraphs;
  for ($i = 0; $i <= 2; $i++) {
    echo "<p>$textParagraphs[$i]</p>";
  }
}
suurAlgus($textParagraphs);
*/

/*
    SIIN ESITADA TEKST NII; ET IGA PRAGRAHVI ALGUSTÄHT ON SUUR (span vahel)
*/
?>
</div>
</body>
</html>
