<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="b-cube-block__content">

<h3 class="b-cube-block__header"><a href="/faq/" ><img src="/images/headers/1.png" width="29" height="26" alt="FAQ" title="FAQ"  /></a></h3>
          <ul class="b-faq-list">

<?foreach($arResult["ITEMS"] as $arItem):?>
<li> <a href="/faq/#faq<?=$arItem["ID"]?>" ><?=$arItem["NAME"]?></a>
              <hr class="b-faq-list__hr">
            </li>

<?endforeach;?>
</ul>
 <div class="b-get-more"><a href="/faq/" >Другие вопросы</a></div>
</div>

