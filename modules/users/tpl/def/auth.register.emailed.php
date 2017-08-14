<p>
<?= _t('users', 'Ձեր նշած էլ․ հասցեին ուղարկվել է հաղորդագրություն։') ?><br />
<?= _t('users', 'Գրանցումն ավարտելու համար խնդրում ենք հաստատել այն։') ?><br />
</p>
<? if($retry_allowed) { ?>
<p id="j-u-register-emailed-retry">
    <br>
    <?= _t('users', 'Դեռ չե՞ք ստացել հաղորդագրություն՝ <a [link_retry]> Ուղարկել կրկին</a>', array('link_retry'=>'href="#" class="ajax"')) ?>
</p>
<script type="text/javascript">
<? js::start(); ?>
    $(function(){
        jUserAuth.registerEmailed(<?= func::php2js(array(
            'lang' => array(
                'success' => _t('users', 'Հաղորդագրությունն ուղարկված է'),
            ),
        )) ?>);
    });
<? js::stop(); ?>
</script>
<? } ?>