<!--        --><?php
//        if(isset($exports)){
//            foreach ($exports as $export){
//                echo $export->fname;
//                ?><!--<br>--><?php
//                mb_internal_encoding("UTF-8");
//                $arr = preg_split('/(?<!^)(?!$)/u', $export->fname);
//                var_dump($arr);
//            }
//        } else {
//            echo 'asd';
//        }
//
//        ?>

<div class="site-index">
    <div class="my-container">
        <div class="my-block">
            <label id="lbl-username">Username</label>
            <span id="lbl-date" class="float-lg-right">date(02.02.2022)</span>
            <div class="my-message">
                <p id="user-text">Вопрос пользователя?</p>
            </div>
        </div>
        <div class="admin-block">
            <label id="lbl-admin">Admin</label>
            <span id="lbl-date" class="float-lg-right">date(02.02.2022)</span>
            <div class="admin-message">
                <p id="admin-text">Ответ администрации?</p>
            </div>
        </div>
    </div>
</div>

<?php foreach ($comments as $comment){ ?>
    <div class="card mt-3">
        <ul class="list-group list-group-flush">
            <li class="list-group-item justify-content-between align-items-center flex-wrap">
                <img src="../../uploads/<?php echo $user->image?>" alt="UserImg" class="rounded-circle" width="30">
                <span class="text-body"><?php echo $comment->body?></span>
            </li>
        </ul>
    </div>
<?php } ?>
