{include file="common/header.tpl"}


<div class="container" style="margin-top: 16px;">

    <div class="panel panel-primary">
        <div class="panel-heading">{$data.Nombre}</div>
        <div class="panel-body">
            <table class="table" style="border:none;">
                <tbody>
                  {foreach from=$data item=value key=key}
                  <tr>
                    <th style="border:none;">{$key}</th>
                    <th style="border:none;">{$value}</th>
                  </tr>
                  {/foreach}
                </tbody>
            </table>
        </div>
    </div>

</div>



</body>
</html>