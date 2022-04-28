<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/bee_styles.css">
    <title>Bee Game</title>
</head>
<body>
    <div class="row">
        <?php
        foreach ($beeArray as $key => $bee) :
            if ($bee->type() === 'Queen') :
                ?>
            <div class="column">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjd_-TXioBJ70JKtTOR2OpAPE_jcYGsqOSVJxBARMqWBa92CeDW9CQUMI2kjNm60ojeUQ&usqp=CAU">
                <b>
                    <em class="<?php
                    if ($hive->hasGameFinished() && $bee->haveLife()) :
                        echo 'green';
                    elseif ($hive->hasGameFinished() && !$bee->haveLife()) :
                        echo 'red';
                    else :
                        echo 'blue';
                    endif;
                    ?>">
                    <?php
                    echo $bee->type;
                    ?> 
                    Life: 
                    <?php
                        echo $bee->lifeSpan;
                    if ($hive->hasGameFinished() && $bee->haveLife()) :
                        ?>
                        WIN!
                            <?php
                    elseif ($hive->hasGameFinished() && !$bee->haveLife()) :
                        ?>
                        LOST!
                            <?php
                    endif;
                    ?>
                    </em>
                </b>
            </div>
                <?php
            elseif ($bee->type() === 'Worker') :
                ?>
            <div class="column">
                <img src="https://thumbs.dreamstime.com/b/clipart-vector-honey-dripping-bee-cartoon-mascot-isolated-white-background-honey-bee-cartoon-clip-art-208850388.jpg" >
                <b>
                    <em class="<?php
                    if (!$bee->haveLife()) :
                        echo 'red';
                    endif;
                    ?>">
                        <?php echo $bee->type ?> 
                        Life: 
                        <?php echo $bee->lifeSpan ?>
                    </em>
                </b>
            </div>
                <?php
            elseif ($bee->type() === 'Drone') :
                ?>
            <div class="column">
                <img src="https://abitofcs4fn.files.wordpress.com/2017/02/cartoon-bee-istock-514407562.jpg">
                <b>
                    <em class="<?php
                    if (!$bee->haveLife()) :
                        echo 'red';
                    endif;
                    ?>">
                    <?php echo $bee->type ?> 
                    Life: 
                    <?php echo $bee->lifeSpan ?>
                    </em>
                </b>
            </div>
                <?php
            endif;
        endforeach;
        ?>
    </div>
    <form action="" method="post" id="form1">
        <?php
        if (!$hive->hasGameFinished()) :
            ?>
        <button type="submit" form="form1" name="button" value="Submit">Submit</button>
            <?php
        else :
            ?>
        <button type="submit" form="form1" name="button" value="Restart">Restart</button>
            <?php
        endif;
        ?>
    </form>
</body>
</html>