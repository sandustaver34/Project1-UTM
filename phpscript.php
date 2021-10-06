<?php
session_start();
$response = $_POST['ans'];
$id = $_POST['current'];


$idd = (int)$id[1] - 1;

$answs = ['stare','stare','stare','stare','stare','stare','stare','stare','stare','stare','stare'];


if ($response == $answs[$idd] && $idd == 0){
    (int)$_SESSION["answ"] = 1;
    $_SESSION["hrd"] = 0;
    $_SESSION["esy"] = 0;

}
elseif ($response != $answs[$idd] && $idd == 0){
    (int)$_SESSION["answ"] = 0;
    $_SESSION["hrd"] = 0;
    $_SESSION["esy"] = 0;
}
elseif ($response == $answs[$idd] && $idd != 0){
    (int)$_SESSION["answ"] = (int)$_SESSION["answ"] + 1;
    $temp = $_SESSION["answ"];

}else {
    (int)$_SESSION["answ"] = (int)$_SESSION["answ"] + 0;
    $temp = $_SESSION["answ"];
}

$hard = [' "Hardcore" 他在篱笆上打了个洞，这样就可以 ',' "Hardcore" 他在篱笆上打了个洞，这样他就可以 ', ' "Hardcore" 如果您在黑暗中进入明亮的阳光下，有时', ' "Hardcore" 小男孩经常站在自行车商店外面', ' "Hardcore" 我们', ' "Hardcore" 你是否', ' "Hardcore" 我以为他很认真，直到我看到他', ' "Hardcore" 祖父的眼睛很不好。他有汤姆', ' "Hardcore" 我看到驾车者下了车', ' "Hardcore" 我看到了他'];

$hards = ['穿过而不会被看见.</p>
<p>', '通过没有被看到.</p>
<p>', '.</p>
<p>', '在窗户上美妙的机器上.</p>
<p>', '如果我们很生气或者我们正在专心.</p>
<p>', '刚才有人通过窗户吗？我以为我刚看到一个人.</p>
<p>', '向我表明他在开玩笑.</p>
<p>', '在报纸上看.</p>
<p>', '愤怒地撞向另一个撞到他后面的司机.</p>
<p>', '快看着他.</p>'];

$easy = ['"Noob" He made a hole in the fence so that he could ', ' "Noob" If you go out into bright sunlight after being in the dark, you sometimes ' , ' "Noob" Small boys often stand outside the bicycle shop and ', ' "Noob" We ', ' "Noob" Did you ', ' "Noob" I thought he was serious until I saw him ', ' "Noob" Grandfather has very bad eyes. He has tom ', ' "Noob" I saw the motorist get out of his car and ', ' "Noob" I saw him ', ' "Noob" I saw him '];

$easys = [' through without being seen.</p>
<p>', '.</p>
<p>', 'at the wonderful machines in the window.</p>
<p>', 'if we are rather annoyed or if we are concentrating.</p>
<p>', 'someone pass the window a moment ago? I thought I just saw someone.</p>
<p>', 'at me to show he was joking.</p>
<p>', 'at the newspaper to read it.</p>
<p>', 'furiously at the other driver who had run into the back of him.</p>
<p>', 'quickly at his watch.</p>'];



if($id == 'q9'){
    $raspuns = '<p>Your Mark is:'.$_SESSION["answ"].'  </p>';
}else{



    if ($_SESSION["answ"] >= 5){
        $raspuns = '<h4>'.($idd + 2).'.'.$hard[$_SESSION["hrd"]].'<select type="text" id="q'.($idd+2).'" name="q2" autocomplete="off">'.$hards[$_SESSION["hrd"]].'<option selected value="">     </option>
        <option value="stare">stare</option>
        <option value="blink"> blink</option>
        <option value="wink">wink</option>
        <option value="peep"> peep</option></select> '.$hards[$_SESSION["hrd"]];
        $_SESSION["hrd"] = (int)$_SESSION["hrd"] + 1;
    }
    if ($_SESSION["answ"] < 5) {
    $raspuns = '<h4>'.($idd+2).'.'.$easy[$_SESSION["esy"]].'<select type="text" id="q'.($idd+2).'" name="q2" autocomplete="off">'.$easys[$_SESSION["esy"]].'<option selected value="">     </option>
    <option value="stare">stare</option>
    <option value="blink"> blink</option>
    <option value="wink">wink</option>
    <option value="peep"> peep</option></select>'.$easys[$_SESSION["esy"]];
    $_SESSION["esy"] = (int)$_SESSION["esy"] + 1;
    }
}

echo json_encode($raspuns);

?>