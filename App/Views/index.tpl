{include file="common/header.tpl"}

<div class="container">
    {foreach from=$data item=val key=key}
    <div><h3>{$key}</h3></div>
    <div class="home-grid">
        {foreach from=$val item=value}
        <div class="card">
            <a href="/{$value.url}">
            <div>
                <img class="card-img" src="{$value.image}" alt="{$value.titulo}">
                <h5 class="card-title" >{$value.titulo}</h5>
            </div>
            </a>
        </div>
        {/foreach}
    </div>
    {/foreach}
</div>

</body>
</html>