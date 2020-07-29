<div class="secHeader">
    <h1 class="text-center">Отзывы пользователей</h1>
</div>
<form class="form-inline" action="/feedback/index">
    <div class="form-row align-items-center">
        <div class="col-auto my-1">
            <label class="my-1 mr-2" for="inlineFormCustomSelect">Вывести</label>
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="sort">
                <option value="all" selected>Все записи</option>
                <option value="5">5 Звездочные (<?= $data['stars'][5] ?>)</option>
                <option value="4">4 Звездочные (<?= $data['stars'][4] ?>)</option>
                <option value="3">3 Звездочные (<?= $data['stars'][3] ?>)</option>
                <option value="2">2 Звездочные (<?= $data['stars'][2] ?>)</option>
                <option value="1">1 Звездочные (<?= $data['stars'][1] ?>)</option>
                <option value="0">Без оценки (<?= $data['stars'][0] ?>)</option>
            </select>
            <button type="submit" class="btn btn-primary">Показать</button>
        </div>
    </div>
</form>
<br>
<?php

    if ($data['posts'] != Null) {
        foreach($data['posts'] as $row) {
            echo '<div class="row">';
            echo '<h4>' . $row['name'] . '</h4><div class="rating-mini">';
            for ($i = 0; $i < $row['rating']; $i++) {
                echo '<span class="active"></span>';
            }
            for ($i = $row['rating']; $i < 5; $i++) {
                echo '<span></span>';
            }
            echo '</div><p><large>' . $row['post'] . '</large></p>';
            echo '</div><br><hr/>';
        }
    }
?>
<!-- Pagination -->
<div id="pagination">
    <div class="text-center">
        <?php if ($data['active'] != 1) { ?>
            <a class="btn btn-lg" href="<?=$data['url_page'].'1'?>" title="Первая страница"><i class="fa fa-angle-double-left"></i></a>
            <a class="btn btn-lg" href="<?php if ($data['active'] == 2) { ?><?=$data['url_page'].'1'?><?php } else { ?><?=$data['url_page'].($data['active'] - 1)?><?php } ?>" title="Предыдущая страница"><i class="fa fa-angle-left"></i></a>
        <?php } ?>
        <?php for ($i = $data['start']; $i <= $data['end']; $i++) { ?>
            <?php if ($i == $data['active']) { ?><span> <a class="btn btn-lg" href="" disabled="yes"><?=$i?></a></span><?php } else { ?><a class="btn btn-lg" href="<?php if ($i == 1) { ?><?=$data['url_page'].'1'?><?php } else { ?><?=$data['url_page'].$i?><?php } ?>"><?=$i?></a><?php } ?>
        <?php } ?>
        <?php if ($data['active'] != $data['totalPage']) { ?>
            <a class="btn btn-lg" href="<?=$data['url_page'].($data['active'] + 1)?>" title="Следующая страница"><i class="fa fa-angle-right"></i></a>
            <a class="btn btn-lg" href="<?=$data['url_page'].$data['totalPage']?>" title="Последняя страница"><i class="fa fa-angle-double-right"></i></a>
        <?php } ?>
    </div>
</div>
<div class="col-lg-12 col-lg-offset-3">
<h1>Добавить новый отзыв</h1>

<form method="post" action="/feedback/add">
    <div class="form-group row">
        <label for="inputEmail" class="col-sm-2 col-form-label">Номер телефона</label>
        <div class="col-sm-3">
            <input type="tel" class="form-control bfh-phone" id="phone" name="phone" data-format="+7 (ddd) ddd-dd-dd" pattern="(\+[\d\ \(\)\-]{16})">
        </div>
    </div>

    <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Имя</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="name" placeholder="Введите имя">
        </div>
    </div>

    <div class="form-group row">
        <label for="inputRate" class="col-sm-2 col-form-label">Оцените нас</label>
        <div class="col-sm-3">
            <div class="rating-area">
                <input type="radio" id="star-5" name="rating" value="5">
                <label for="star-5" title="Отлично"></label>
                <input type="radio" id="star-4" name="rating" value="4">
                <label for="star-4" title="Хорошо"></label>
                <input type="radio" id="star-3" name="rating" value="3">
                <label for="star-3" title="Удовлетворительно"></label>
                <input type="radio" id="star-2" name="rating" value="2">
                <label for="star-2" title="Неудовлетворительно"></label>
                <input type="radio" id="star-1" name="rating" value="1">
                <label for="star-1" title="Ужастно"></label>
                <input type="radio" id="star-0" name="rating" value="0" hidden checked>
            </div>
        </div>
    </div>

    <div  class="form-group row">
        <label for="inputDate" class="col-sm-2 col-form-label">Время посещения</label>
        <div class="col-sm-3">
            <div class="input-group" id="datetimepicker">
                <input type="text" class="form-control" name="time">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
        </div>
    </div>

    <div class="form-group row">

        <div class="col-sm-5">
            <label for="inputPost" class="col-form-label">Опишите свои эмоции от посещения нашего заведения</label>
            <textarea class="form-control" name="post" rows="5"></textarea>
        </div>
    </div>

    <div class="form-group row">
        <div class="offset-sm-2 col-sm-3">
            <input type="submit" value="Отправить" name="submit" class="btn btn-primary"/>
        </div>
    </div>
</form>
</div>