
{if $filtros.paginas > 1}
<ul class="pagination">
    <li class="{if $filtros.pagina <= 1}disabled{/if}">
        {if $filtros.pagina <= 1}<a>Primera</a>{else}
        <a href="?{if $filtros.otros}{$filtros.otros}&{/if}pagina=1">Primera</a>{/if}
    </li>
    <li class="{if $filtros.pagina <= 1}disabled{/if}">
        {if $filtros.pagina <= 1}<a>Anterior</a>{else}
        <a href="?{if $filtros.otros}{$filtros.otros}&{/if}pagina={$filtros.pagina-1}">Anterior</a>{/if}
    </li>
    <li class="{if $filtros.pagina >= $filtros.paginas}disabled{/if}">
        {if $filtros.pagina >= $filtros.paginas}<a>Siguiente</a>{else}
        <a href="?{if $filtros.otros}{$filtros.otros}&{/if}pagina={$filtros.pagina+1}">Siguiente</a>{/if}
    </li>
    <li class="{if $filtros.pagina eq $filtros.paginas}disabled{/if}">
        {if $filtros.pagina >= $filtros.paginas}<a>Ultima</a>{else}
        <a href="?{if $filtros.otros}{$filtros.otros}&{/if}pagina={$filtros.paginas}">Ultima</a></li>{/if}
</ul>
{/if}