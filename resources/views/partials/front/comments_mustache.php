<!-- Posted Comments -->

<!-- Comment -->
<div id='comments_container'>
    
</div>

<script type='text/mustache' id='comment_mustache_template'>
    
    {{#comentarios}}
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="" alt="">
            </a>
            <div class="media-body" >
                <h4 class="media-heading">
                    <span class="text-success">{{user.username}}</span>
                    <small>{{created_date}} {{created_time}}hs</small>
                </h4>
                {{content}}
            </div>
        </div>
        <hr/>
    {{/comentarios}}

</script>