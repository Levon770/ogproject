$(function(){function onFilterRegion(data,submit)
{if(submit){var $form=$('#j-f-form');$form.attr('action',$form.attr('action').replace(app.hostSearch,data.link));$form.append('<input type="hidden" name="region" value="'+data.id+'" />');$form.submit()}}
    $(function(){$('#j-f-categories-toggle').click(function(e){e.preventDefault();$(this).closest('li').remove();$('#j-f-categories-block ul li').removeClass('hide')})});app.popup('f-region-desktop','#j-f-region-desktop-popup','#j-f-region-desktop-link',{onInit:function($p){var _this=this;var $st1=$p.find('#j-f-region-desktop-st1');var $st2=$p.find('#j-f-region-desktop-st2'),st2cache={},st2citySel='.f-navigation__region_change__links a';function doFilter(type,$link)
    {var f=$link.metadata();f.type=type;f.link=$link.attr('href');_this.getLink().text(f.title);onFilterRegion(f,!0)}
        $st1.on('click','.f-navigation__region_change__links a',function(){var region=$(this).metadata();if(st2cache.hasOwnProperty(region.id)){$st2.html(st2cache[region.id].html).add($st1).toggleClass('hide')}else{bff.ajax(bff.ajaxURL('geo','filter-desktop-step2'),{region_id:region.id},function(data){if(data&&data.success){$st2.html((st2cache[region.id]=data).html).add($st1).toggleClass('hide')}})}
            return!1});var $st1q=$st1.find('#j-f-region-desktop-st1-q'),$st1v=!1;$st1q.keyup(function(){$(this).next().click()}).next().click(function(){if($st1v==!1)$st1v=$st1.find('#j-f-region-desktop-st1-v');var q=$st1q.val().toLowerCase();$st1v.find('ul, li').show();if(q=='')return!1;$st1v.find('a').each(function(){if($(this).attr('title').toLowerCase().indexOf(q)==-1)$(this).parent().hide()});$st1v.find('ul.rel').each(function(){if($(this).show().find('li:visible').length==1)$(this).hide()});$st1v.find('li.span3').each(function(){if(!$(this).show().find('ul:visible').length)$(this).hide()});return!1});$st1.on('click','#j-f-region-desktop-all',function(e){nothing(e);_this.hide();doFilter('all',$(this));return!1});$st2.on('click',st2citySel,function(e){nothing(e);_this.hide();var $link=$(this);$link.metadata().title=$link.attr('title');$link.addClass('active').siblings().removeClass('active');doFilter('city',$link);return!1});$st2.on('click','.j-f-region-desktop-st2-region',function(e){nothing(e);$st2.find(st2citySel).removeClass('active');_this.hide();doFilter('region',$(this));return!1});$st2.on('click','.j-f-region-desktop-back',function(e){nothing(e);$st2.add($st1).toggleClass('hide');return!1})}});app.popup('f-country-desktop','#j-f-country-desktop-popup','#j-f-region-desktop-link',{onInit:function($p){var _this=this;function doFilter(type,$link)
    {var f=$link.metadata();f.type=type;f.link=$link.attr('href');_this.getLink().text(f.title);onFilterRegion(f,!0)}
        var $st0=$p.find('#j-f-country-desktop-st0');var $st1=$p.find('#j-f-region-desktop-st1'),st1cache={};var $st1v=$st1.find('#j-f-region-desktop-st1-v');var $st1title=$st1.find('#j-f-region-desktop-country-title');var $country=!1;$st0.on('click','.f-navigation__country_change__links a',function(){$country=$(this);$st1title.text($country.text());var country=$country.metadata();if(st1cache.hasOwnProperty(country.id)){$st1v.html(st1cache[country.id].html);$st1.add($st0).toggleClass('hide')}else{bff.ajax(bff.ajaxURL('geo','filter-desktop-step1'),{region_id:country.id},function(data){if(data&&data.success){$st1v.html((st1cache[country.id]=data).html);$st1.add($st0).toggleClass('hide')}})}
            return!1});$st1.on('click','#j-f-country-desktop-all',function(e){nothing(e);_this.hide();if(!$country){$country=$(this)}
            doFilter('country',$country);return!1});$st1.on('click','.j-f-region-desktop-back',function(e){nothing(e);$st0.toggleClass('hide');$st1.toggleClass('hide');return!1});var $st1q=$st1.find('#j-f-region-desktop-st1-q');$st1q.keyup(function(){$(this).next().click()}).next().click(function(){var q=$st1q.val().toLowerCase();$st1v.find('ul, li').show();if(q=='')return!1;$st1v.find('a').each(function(){if($(this).attr('title').toLowerCase().indexOf(q)==-1)$(this).parent().hide()});$st1v.find('ul.rel').each(function(){if($(this).show().find('li:visible').length==1)$(this).hide()});$st1v.find('li.span3').each(function(){if(!$(this).show().find('ul:visible').length)$(this).hide()});return!1});var $st2=$p.find('#j-f-region-desktop-st2'),st2cache={},st2citySel='.f-navigation__region_change__links a';$st1.on('click','.f-navigation__region_change__links a',function(){var region=$(this).metadata();if(st2cache.hasOwnProperty(region.id)){$st2.html(st2cache[region.id].html).add($st1).toggleClass('hide')}else{bff.ajax(bff.ajaxURL('geo','filter-desktop-step2'),{region_id:region.id},function(data){if(data&&data.success){$st2.html((st2cache[region.id]=data).html).add($st1).toggleClass('hide')}})}
            return!1});$st2.on('click','.j-f-region-desktop-back',function(e){nothing(e);$st2.add($st1).toggleClass('hide');return!1});$st0.on('click','#j-f-region-desktop-all',function(e){nothing(e);_this.hide();doFilter('all',$(this));return!1});$st2.on('click',st2citySel,function(e){nothing(e);_this.hide();var $link=$(this);$link.metadata().title=$link.attr('title');$link.addClass('active').siblings().removeClass('active');doFilter('city',$link);return!1});$st2.on('click','.j-f-region-desktop-st2-region',function(e){nothing(e);$st2.find(st2citySel).removeClass('active');_this.hide();doFilter('region',$(this));return!1})}});app.popup('f-region-phone','#j-f-region-phone-popup','#j-f-region-phone-link',{onInit:function($p){var _this=this;var $q=$p.find('#j-f-region-phone-q');var $qList=$p.find('#j-f-region-phone-q-list'),qListPresuggest=$qList.html();function doFilter(data)
    {$q.val('');qList(qListPresuggest,'');_this.getLink().find('span').text(data.title);onFilterRegion(data,!0)}
        function qList(data,q)
        {var $notFoundList=$qList.next();if(!data.length){$qList.hide().html(qListPresuggest);$notFoundList.find('.word').text(q);$notFoundList.show()}else{$notFoundList.hide();$qList.html(data).show()}}
        $q.keyup(function(){var q=this.value.toLowerCase();if(!q.length){qList(qListPresuggest,'')}else if(q.length>=2){bff.ajax(bff.ajaxURL('geo','filter-phone-suggest'),{q:q},function(data){if(data){qList(data.html,q)}})}}).next().click(function(e){nothing(e);$q.keyup()});$qList.on('click','li',function(e){nothing(e);_this.hide();doFilter($(this).metadata());return!1})}})})