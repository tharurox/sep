<div style="height: 500px; overflow-y: scroll">
<center><h3><u>News Feed</u></h3></center>
<ul class="news-items">
    <?php foreach ($news as $row) { ?>
        <li>
            <div class="media">
                <div class="pull-right">
                    <small>Published on <?php echo $row->create_at ?></small>
                </div>
                <div class="media-body">
                    <h4><?php echo $row->name ?></h4>
                    <p><?php echo $row->description ?></p>
                </div>
            </div>
        </li>
    <?php } ?>
</ul>
</div>