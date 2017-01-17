<?php require_once ('inc/inc.php'); ?>
<?php require_once('template-parts/header.php'); ?>

<p>
    <a id="loadData" data-id="123" class="btn btn-primary">Load Data</a>
    <small id="ajax-loader" class="text-muted" style="display: none">Loading...</small>
</p>

<div id="view"></div>

<script type="application/javascript">
    jQuery(function($) {
        $(document).on("click", "#loadData", function () {
            $.ajax({
                url: 'target/target-handlebars.php',
                data: "id=" + $(this).data('id'),
                beforeSend: function () {
                    $("#ajax-loader").show();
                },
                complete: function () {
                    $("#ajax-loader").hide();
                },
                success: function (result) {
                    var context = JSON.parse(result);
                    var template = $('#handlebars-source').html();
                    var templateScript = Handlebars.compile(template);
                    $("#view").html(templateScript(context));

                }
            });
        });
    });
</script>
<script id="handlebars-source" type="text/x-handlebars-template">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        {{#students}}
        <tr>
            <td>{{name}}</td>
            <td>{{email}}</td>
        </tr>
        {{/students}}
        </tbody>
    </table>
</script>
<?php require_once('template-parts/footer.php'); ?>
