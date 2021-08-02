<?php

$table = $this->db->query('SELECT * FROM `city_select`')->fetchAll();

if ($_GET['remId']) {
    $id = $_GET['remId'];

    $this->db->query('DELETE FROM `city_select` where c_id="' . $id . '"');

    echo 'work';

}
if ($_GET['addId']) {

    $this->db->query('INSERT INTO `city_select` (`c_id`, `c_name`, `c_content`) VALUES (NULL, NULL, NULL)');

    echo 'work';
}

if ($_GET['c_id'] && $_GET['c_name'] || $_GET['c_content']) {

    $this->db->query("UPDATE `city_select` SET `c_name` = '" . $_GET['c_name'] . "', `c_content` = '" . $_GET['c_content'] . "' WHERE `city_select`.`c_id` = " . $_GET['c_id'] . " ");

    echo 'work';
}

?>
<h1>Добро пожаловать !</h1>

<table id="listmod" class="sTable" width="100%">
    <thead class="headerHead">
    <tr class="servicePanel">
        <th colspan="100">
            <div class="recordNum">
                <b>Всего:</b>&nbsp;<?= count($table) ?>
            </div>
            <div style="float:right;"></div>
        </th>
    </tr>
    <tr class="headerText">
        <td rowspan="1" width="1%">№</td>
        <td style="cursor:pointer;" width="250">
            <div>Город
                <div style="float:right;"></div>
            </div>
        </td>

        <td style="cursor:pointer;" width="150">
            <div>Описание
                <div style="float:right;"></div>
            </div>
        </td>
    </tr>
    </thead>
    <?php foreach ($table as $item) { ?>

        <?php echo '<tbody class="city_row">
                    <tr id=' . $item['c_id'] . ' class="c_id pointer"><td>' . $item['c_id'] . '</td>
                    <td class="edit c_name" width="50">' . $item['c_name'] . '</td>
                    <td class="edit c_content" width="350">' . $item['c_content'] . '</td>
                    </tr>
                    </tbody>
                    ' ?>
    <?php } ?>

    <!--<tfoot>
    <tr>
        <td colspan="100" style="padding:0">
            <table class="paginTable" id="pagin_mod" width="100%">

                <tbody><tr>
                    <td width="100%" align="center">
                        1 из 1
                    </td>
                </tr>
                </tbody>

            </table>
        </td>
    </tr>
    </tfoot>-->

</table>
<div style="margin-top: 20px;">
    <div style="float:left;">
        <input type="button" class="button" id="add_btn" value="Добавить">
    </div>
    <div style="float:left;">
        <input type="button" class="button edit_btn req_false" id="edit_btn" value="Редактировать">
    </div>
    <div style="float:left;">
        <input type="button" class="button" id="del_btn" value="Удалить">
    </div>
</div>


<style>
    .active_item {
        background-color: #a5a9b6 !important;
    }

    .city_row:hover {
        background-color: #a5a9b6 !important;
    }

    .table.sTable td {
        pointer-events: none;
    }
</style>


<script>

    $(document).ready(function () {
        $('.city_row').click(function () {
            $('.city_row').removeClass('active_item');
            $(this).addClass('active_item');
        })

        $('#del_btn').click(function () {
            let remId = 'remId=' + $('.city_row.active_item > tr').attr('id');
            $.ajax({
                type: "GET",
                url: "index.php?module=city",
                data: remId,
                success: function () {
                    location.reload();
                }
            })
        })
        $('#add_btn').click(function () {
            let addItem = 'addId=' + 1;
            $.ajax({
                type: "GET",
                url: "index.php?module=city",
                data: addItem,
                success: function () {
                    location.reload();
                }
            })
        })

        $('#edit_btn').click(function () {
            if ($('#edit_btn').hasClass('req_false')) {
                if (!$('#edit_item').length) {
                    $('.city_row.active_item .edit').attr('contenteditable', 'true').addClass('edit_item')
                    $('.city_row.active_item').addClass('edit_item')
                    $(this).removeClass('req_false')
                    if ($('.city_row.active_item').hasClass('edit_item')) {
                        $('#edit_btn').val('Ok');
                    }
                } else {
                }
            } else {

                let c_id = $('.edit_item .c_id').attr('id');
                let c_name = $('.edit_item .c_name').text();
                let c_content = $('.edit_item .c_content').text();
                $.ajax({
                    type: "GET",
                    url: "index.php?module=city",
                    data: {
                        c_id: c_id,
                        c_name: c_name,
                        c_content: c_content,
                    },
                    success: function () {
                        location.reload();
                    }
                })
            }
        })

    })
</script>
