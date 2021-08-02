<?php
require_once ('ModCityController.php');

?>


<h1>Добро пожаловать !</h1>
<div>
    <div class="row"></div>

    <table id="listmod" class="sTable" width="100%">
        <thead class="headerHead">
        <tr class="servicePanel">
            <th colspan="100">
                <div class="recordNum">
                    <b>Всего:</b><!--&nbsp;1-->
                </div>
                <div style="float:right;"></div>
            </th>
        </tr>
        <tr class="headerText">
            <td rowspan="1" width="1%">№</td>
            <td style="cursor:pointer;" width="250">
                <div>Город<div style="float:right;"></div></div>
            </td>

            <td style="cursor:pointer;" width="150">
                <div>Описание<div style="float:right;"></div></div>
            </td>
        </tr>
        </thead>


        <tbody class="city_row">
        <tr class="pointer"><td>1</td>
            <td width="50">Минск</td>
            <td width="350">Минск (белор. Мінск) — столица Белоруссии, административный центр Минской области и Минского района, в состав которых не входит, поскольку является самостоятельной административно-территориальной единицей с особым (столичным) статусом.</td>
        </tbody>

        <tbody class="city_row">
        <tr class="pointer"><td>1</td>
            <td width="50">Брест</td>
            <td width="350">Брест (белор. Брэст) — город на юго-западе Белоруссии, административный центр Брестской области и Брестского района.</td>
        </tbody>

        <tfoot>
        <tr>
            <td colspan="100" style="padding:0">
                <table class="paginTable" id="pagin_mod" width="100%">
                    <tbody><tr>


                        <td width="100%" align="center">

                            <!-- 1 из 1 -->

                        </td>
                    </tr>
                    </tbody>

                </table>
            </td>
        </tr>
        </tfoot>
    </table>
    <div style="margin-top: 20px;">
        <div style="float:left;">
            <input type="button" class="button" value="Добавить" onclick="">
        </div>
        <div style="float:left;">
            <input type="button" class="button" value="Подтвердить" onclick="">
        </div>
        <div style="float:left;">
            <input type="button" class="button" value="Удалить" onclick="load()">
        </div>
    </div>


    <style>
        .active {
            background-color: #6a8caf !important;
        }
        .city_row:hover {
            background-color: #6a8caf !important;
        }
        .table.sTable td {
            pointer-events: none;
        }
    </style>



    <script>
        $(document).ready(function () {
            $('.city_row').click(function () {
                $('.city_row').removeClass('active');
                $(this).addClass('active');
            })




            $('.item_add').click(function () {
                $('.city').append("<td contenteditable='true'></td>");
                $('.description').append("<td contenteditable='true'></td>");
            })
        })
    </script>
