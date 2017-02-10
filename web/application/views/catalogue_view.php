<!-- <?
echo "<pre>";
print_r($data);
?> -->

<div class="container">
    <div class='lside'>
        <h4>Подбор по параметрам:</h4><hr>
        <div>
            <a onclick="hidetxt('div1'); return false;" href="#" rel="nofollow">Производитель</a>
            <div style="display:none;" id="div1">
                <input type="checkbox"  name="brand" value='apple' ><label for="apple_name"  >Apple</label><br>
                <input type="checkbox"  name="brand[1]" value='samsung' id='samsung_name'><label for="samsung_name" >Samsung</label><br>
                <input type="checkbox"  name="brand[2]" value='lenovo' id='lenovo_name'><label for="lenovo_name">Lenovo</label><br>
                <input type="checkbox"  name="brand[3]" value='htc' id='htc_name'><label for="htc_name">HTC</label><br>
                <input type="checkbox"  name="brand[4]" value='xiaomi' id='xiaomi_name'><label for="xiaomi_name">Xiaomi</label><br>
                <input type="checkbox"  name="brand[5]" value='sony' id='sony_name'><label for="sony_name">Sony</label><br>
                <input type="checkbox"  name="brand[6]" value='asus' id='asus_name'><label for="asus_name">Asus</label><br>
                <input type="checkbox"  name="brand[7]" value='meizu' id='meizu_name'><label for="meizu_name">Meizu</label><br>
                <input type="checkbox"  name="brand[8]" value='huawei' id='huawei_name'><label for="huawei_name">Huawei</label><br>
                <input type="checkbox"  name="brand[9]" value='microsoft' id='microsoft_name'><label for="microsoft_name">Microsoft</label><br>
                <input type="checkbox"  name="brand[10]" value='motorolla' id='motorolla_name'><label for="motorolla_name">Motorolla</label><br>
            </div>
        </div><hr>
        <div>
            <a onclick="hidetxt('div2'); return false;" href="#" rel="nofollow">Диагональ</a>
            <div style="display:none;" id="div2">
                <input type="checkbox" onclick="document.getElementById('sort').submit();" name="size[0]" value='displ_size < 4' id='size1'><label for="size1">До 4"</label><br>
                <input type="checkbox" onclick="document.getElementById('sort').submit();" name="size[1]" value='displ_size >= 4 AND displ_size <= 5' id='size2'><label for="size2">4"-5"</label><br>
                <input type="checkbox" onclick="document.getElementById('sort').submit();" name="size[2]" value='displ_size > 5 AND displ_size <= 6"' id='size3'><label for="size3">5.1"-6"</label><br>
                <input type="checkbox" onclick="document.getElementById('sort').submit();" name="size[3]" value='displ_size > 6' id='size4'><label for="size4">Более 6"</label><br>
            </div>
        </div><hr>
        <div>
            <a onclick="hidetxt('div3'); return false;" href="#" rel="nofollow">Оперативная память</a>
            <div style="display:none;" id="div3">
                <input type="checkbox" onclick="document.getElementById('sort').submit();" name="ram[0]" value='ram < 1' id='ram1'><label for="ram1">< 1 Гб</label><br>
                <input type="checkbox" onclick="document.getElementById('sort').submit();" name="ram[1]" value='ram >= 1 AND ram <= 1.5' id='ram2'><label for="ram2">1-1.5 Гб</label><br>
                <input type="checkbox" onclick="document.getElementById('sort').submit();" name="ram[2]" value='ram = 2' id='ram3'><label for="ram3">2 Гб</label><br>
                <input type="checkbox" onclick="document.getElementById('sort').submit();" name="ram[3]" value='ram = 3' id='ram4'><label for="ram4">3 Гб</label><br>
                <input type="checkbox" onclick="document.getElementById('sort').submit();" name="ram[4]" value='ram = 4' id='ram5'><label for="ram5">4 Гб</label><br>
                <input type="checkbox" onclick="document.getElementById('sort').submit();" name="ram[5]" value='ram = 6' id='ram6'><label for="ram6">6 Гб</label><br>
            </div>
        </div><hr>
        <div>
            <a onclick="hidetxt('div4'); return false;" href="#" rel="nofollow">Разрешение экрана</a>
            <div style="display:none;" id="div4">
                <input type="checkbox" onclick="document.getElementById('sort').submit();" name="resol[0]" value='resolution = 3840x2160' id='resol1'><label for="resol1">4K UHD (3840x2160) </label><br>
                <input type="checkbox" onclick="document.getElementById('sort').submit();" name="resol[1]" value='resolution = 2560х1440' id='resol2'><label for="resol2">WQHD (2560х1440)</label><br>
                <input type="checkbox" onclick="document.getElementById('sort').submit();" name="resol[2]" value='resolution = 1920x1080' id='resol3'><label for="resol3">FullHD (1920x1080)</label><br>
                <input type="checkbox" onclick="document.getElementById('sort').submit();" name="resol[3]" value='resolution = 1280x720' id='resol4'><label for="resol4">HD (1280x720)</label><br>
                <input type="checkbox" onclick="document.getElementById('sort').submit();" name="resol[4]" value='resolution = 1024х768' id='resol5'><label for="resol5">1024х768</label><br>
                <input type="checkbox" onclick="document.getElementById('sort').submit();" name="resol[5]" value='resolution = 960x540' id='resol6'><label for="resol6">qHD (960x540)</label><br>
            </div>
        </div><hr>
        <div>
            <a onclick="hidetxt('div5'); return false;" href="#" rel="nofollow">Основная камера</a>
            <div style="display:none;" id="div5">
                <input type="checkbox" onclick="document.getElementById('sort').submit();" name="cam[0]" value='camera <= 7' id='cam1'><label for="cam1">2 - 7 Мп </label><br>
                <input type="checkbox" onclick="document.getElementById('sort').submit();" name="cam[1]" value='camera >= 8 AND camera <= 12' id='cam2'><label for="cam2">8 - 12 Мп</label><br>
                <input type="checkbox" onclick="document.getElementById('sort').submit();" name="cam[2]" value='camera >= 13' id='cam3'><label for="cam3">13 и более Мп</label><br>
            </div>
        </div><hr>
        <div>
            <a onclick="hidetxt('div6'); return false;" href="#" rel="nofollow">Тип дисплея</a>
            <div style="display:none;" id="div6">
                <input type="checkbox" onclick="document.getElementById('sort').submit();" name="displ[0]" value='display =IPS' id='displ1'><label for="displ1">IPS </label><br>
                <input type="checkbox" onclick="document.getElementById('sort').submit();" name="displ[1]" value='display =AMOLED' id='displ2'><label for="displ2">AMOLED </label><br>
                <input type="checkbox" onclick="document.getElementById('sort').submit();" name="displ[2]" value='display =Super AMOLED' id='displ3'><label for="displ3">Super AMOLED</label><br>
                <input type="checkbox" onclick="document.getElementById('sort').submit();" name="displ[2]" value='display =TFT' id='displ4'><label for="displ4">TFT</label><br>
            </div>
        </div><hr>
        <div>
            <a onclick="hidetxt('div7'); return false;" href="#" rel="nofollow">Цена</a>
            <div style="display:none;" id="div7">
                <input type="checkbox" onclick="document.getElementById('sort').submit();" name="price[0]" value='price < 1000' id='price1'><label for="price1">До 1000 грн </label><br>
                <input type="checkbox" onclick="document.getElementById('sort').submit();" name="price[1]" value='price >= 1000 AND price < 2000' id='price2'><label for="price2">От 1000 до 2000 грн</label><br>
                <input type="checkbox" onclick="document.getElementById('sort').submit();" name="price[2]" value='price >= 2000 AND price < 3000' id='price3'><label for="price3">От 2000 до 3000 грн</label><br>
                <input type="checkbox" onclick="document.getElementById('sort').submit();" name="price[3]" value='price >= 3000 AND price < 5000' id='price4'><label for="price4">От 3000 до 5000 грн</label><br>
                <input type="checkbox" onclick="document.getElementById('sort').submit();" name="price[4]" value='price >= 5000 AND price < 10000' id='price5'><label for="price5">От 5000 до 10000 грн</label><br>
                <input type="checkbox" onclick="document.getElementById('sort').submit();" name="price[5]" value='price >= 10000' id='price6'><label for="price6">Более 10000 грн</label><br>
            </div>
        </div>
    </div> <!-- end class='lside' -->
    <script>
        var show;
        function hidetxt(type)
        {
            param=document.getElementById(type);
            if(param.style.display == "none") {
                if(show) show.style.display = "none";
                    param.style.display = "block";
                    show = param;
            }else param.style.display = "none"
        }
    </script>

   <!--  <div class="sort">
        <form action="" method="post" >            
            <select name="category" onchange="this.form.submit()">
                <option value="raiting" <?if($_POST['category'] == "raiting"){echo 'selected';}?>>по рейтингу</option>
                <option value="cheap" <?if($_POST['category'] == "cheap"){echo 'selected';}?>>от дешевых к дорогим</option>
                <option value="expensive"<?if($_POST['category'] == "expensive"){echo 'selected';}?>>от дорогих к дешевым</option>
                <option value="new"<?if($_POST['category'] == "new"){echo 'selected';}?>>новинки</option>
            </select>
        </form>
    </div> -->

   <!--  <div class="sort">
        <form action="" method="post" >            
            <select name="category" onchange="this.form.submit()">
                <option value="raiting" >по рейтингу</option>
                <option value="cheap" >от дешевых к дорогим</option>
                <option value="expensive">от дорогих к дешевым</option>
                <option value="new">новинки</option>
            </select>
        </form>
    </div> -->

    <div class="sort">
       <span style="text-decoration: underline; cursor: pointer; " id="cheap">От дешевых к дорогим</span><br><br>
       <span style="text-decoration: underline;cursor: pointer; " id="expensive">От дорогиx к дешевым</span>
   </div>
   <!--  <div id="aaa"></div> -->
    <div class="main">
        <div id="fon"></div>
        <div id="load"></div>
        <ul id="tovar">
            <?foreach ($data as $key => $good){
                $good_id=$key;?>  <!--айди товара -->
                <li>
                    <div class="good col-sm-12" >
                        <!-- видеообзор -->
                        <div class="video">
                            <?if ($good["video"]){?>
                            <a href="<?=$good["video"]?>"><center><img src="web/images/static_img/video.jpg" title="Видеообзор" alt="Видеообзор" 	width="25px" /><br>video</center></a>
                            <?}?>
                        </div>
                        <!-- стикер -->
                        <?switch ($good["sticker"]){
                            case false;
                            $class = "";
                            break;
                            case "Суперцена";
                            $class = "superPrice";
                            break;
                            case "Топ продаж";
                            $class = "topSales";
                            break;
                            case "Акция";
                            $class = "stock";
                            break;
                        }?>
                        <div class="<?=$class?>"><?=$good["sticker"]?></div>

                        <!-- демо-видео -->
                        <div class="demo">
                            <?
                            if ($good["demo"]) {?>
                            <a href="<?=$good["demo"]?>"><center><img src="web/images/static_img/demo.jpg" title="Демонстрация" alt="Демонстрация" width="25px" /><br>demo</center></a>
                            <?}?>
                        </div>

                        <!-- изображение товара -->
                        <div class="imgGood">
                            <a href="<?=$good["alias"]?>"> <center><img src="web/images/dynamic_img/<?=$good['images']["main_img_medium"];?>" width=100%
                                alt="<?=$good['images']["alt_img"]?>" title="<?=$good['images']["title_img"]?>" ></center> </a>
                            </div>

                            <!-- цвета товара -->
                            <div class="colorsGood">
                                <?foreach($good['colors'] as $k=>$v){?>
                                <a href="/product?id=<?=$key?>"><img src="web/images/static_img/<?=$v["target"]?>" width=100% class="colorChoise" alt="<?=$v["name"]?>"/></a><br>
                                <?}?>
                            </div>

                            <!-- наличие товара -->
                            <div class="endingGood">
                                <?if ($good["in_stock"]) {?>
                                <center>Заканчивается</center>
                                <?}?>
                            </div>

                            <!-- название товара -->
                            <div class="nameGood">                        
                                <a href="<?=$good["alias"]?>">Мобильный телефон <?=$good["name"]?></a>
                            </div>


                            <!-- старая цена товара -->
                            <div class="oldPrice">
                                <?if ($good["old_price"]) {?>
                                <del><span><?=$good["old_price"]."<small>"?></span></del><?=" грн</small>"?>
                                <?}?>
                            </div>

                            <!-- актуальная цена товара -->
                            <div class="PriceContainer">
                                <div class="price">
                                    <?if ($good["price"]) {?>
                                    <?=$good["price"]."<small> грн</small>"?>
                                    <?}?>
                                </div>

                                <!-- рейтинг товара -->
                                <div class="raiting">
                                    <i class="sprite sprite-<?=$good["raiting"]?>" width=100%></i>
                                </div>

                                <!-- отзывы -->
                        <!--                --><?//$query="SELECT `id_comm`, `g_id`, `comm_description`, `plus`, `minus`
                        //					  FROM `comments`
                        //					  WHERE g_id=$g_id;";
                        //                $res=mysqli_query($dbc, $query);
                        //                $comments=[];
                        //                while ($row = mysqli_fetch_assoc($res)){
                        //                    $comments[]=$row;
                        //                }
                        //                $comments_count = count($comments);
                        $comments_count = 0; // времено
                        //                ?>
                        <div class="reviews">
                            <?for($f=$comments_count; $f<=$comments_count; $f++){
                                $rest=$f%10;
                                if(($f===0) || ($rest>=5 && $rest<=9) || ($f%100>=10 && $f<=20)){
                                    $last="ов";
                                }elseif($rest===1){
                                    $last= "";
                                }else{$last= "a";
                            }
                        }?>
                        <a href=""><?=$comments_count." "." отзыв".$last?> </a>
                    </div>
                </div>

                <div class="idGood">
                    <a href="/basket/add?id=<?=$good["id"]?>"><img src="web/images/static_img/buy_button.png" width="130px" width=100%></a>
                </div>

                <!-- особенности товара -->
                <div class="features">
                    <span>
                        <?foreach($good['features'] as $k=>$v){?>
                        <img src="web/images/static_img/<?=$v["feature_img"]?>" width=100% title="<?=$v["feature_name"]?>">
                        <?}?>
                    </span>
                </div>

                <!-- описание товара -->
                <div class="description">
                    <?=$good["description"]?>
                </div>
            </div>
        </li>
        <?}?>
    </ul>
    </div><!-- end class='lside' -->
    <div id="footer">ПАГИНАЦИЯ</div>
    </div>
























