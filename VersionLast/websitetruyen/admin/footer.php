 <div class="footer">
        <div class="footer-inner">
          <div class="footer-content">
            <span class="bigger-120">
              <span class="blue bolder">Ace</span>
              Application &copy; 2013-2014
            </span>

            &nbsp; &nbsp;
            <span class="action-buttons">
              <a href="#">
                <i
                  class="ace-icon fa fa-twitter-square light-blue bigger-150"
                ></i>
              </a>

              <a href="#">
                <i
                  class="ace-icon fa fa-facebook-square text-primary bigger-150"
                ></i>
              </a>

              <a href="#">
                <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
              </a>
            </span>
          </div>
        </div>
      </div>

      <a
        href="#"
        id="btn-scroll-up"
        class="btn-scroll-up btn btn-sm btn-inverse"
      >
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
      </a>
    </div>
    <!-- /.main-container -->

    <!-- basic scripts -->

    <!--[if !IE]> -->
    <script src="/websitetruyen/admin/assets/js/jquery-2.1.4.min.js"></script>

    <!-- <![endif]-->

    <!--[if IE]>
      <script src="assets/js/jquery-1.11.3.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
      if ("ontouchstart" in document.documentElement)
        document.write(
          "<script src='/websitetruyen/admin/assets/js/jquery.mobile.custom.min.js'>" +
            "<" +
            "/script>"
        );
    </script>
    <script src="/websitetruyen/admin/assets/js/bootstrap.min.js"></script>

    <!-- page specific plugin scripts -->
    <script src="/websitetruyen/admin/assets/js/jquery-ui.custom.min.js"></script>
    <script src="/websitetruyen/admin/assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="/websitetruyen/admin/assets/js/jquery.easypiechart.min.js"></script>
    <script src="/websitetruyen/admin/assets/js/jquery.sparkline.index.min.js"></script>
    <script src="/websitetruyen/admin/assets/js/jquery.flot.min.js"></script>
    <script src="/websitetruyen/admin/assets/js/jquery.flot.pie.min.js"></script>
    <script src="/websitetruyen/admin/assets/js/jquery.flot.resize.min.js"></script>

    <script src="/websitetruyen/admin/assets/js/jquery.dataTables.min.js"></script>
    <script src="/websitetruyen/admin/assets/js/jquery.dataTables.bootstrap.min.js"></script>
    <script src="/websitetruyen/admin/assets/js/dataTables.buttons.min.js"></script>
    <script src="/websitetruyen/admin/assets/js/buttons.flash.min.js"></script>
    <script src="/websitetruyen/admin/assets/js/buttons.html5.min.js"></script>
    <script src="/websitetruyen/admin/assets/js/buttons.print.min.js"></script>
    <script src="/websitetruyen/admin/assets/js/buttons.colVis.min.js"></script>
    <script src="/websitetruyen/admin/assets/js/dataTables.select.min.js"></script>

    <script src="/websitetruyen/admin/assets/js/jquery.bootstrap-duallistbox.min.js"></script>
    <script src="/websitetruyen/admin/assets/js/jquery.raty.min.js"></script>
    <script src="/websitetruyen/admin/assets/js/bootstrap-multiselect.min.js"></script>
    <script src="/websitetruyen/admin/assets/js/select2.min.js"></script>
    <script src="/websitetruyen/admin/assets/js/jquery-typeahead.js"></script>

		<script src="/websitetruyen/admin/assets/js/chosen.jquery.min.js"></script>
		<script src="/websitetruyen/admin/assets/js/spinbox.min.js"></script>
		<script src="/websitetruyen/admin/assets/js/bootstrap-datepicker.min.js"></script>
		<script src="/websitetruyen/admin/assets/js/bootstrap-timepicker.min.js"></script>
		<script src="/websitetruyen/admin/assets/js/moment.min.js"></script>
		<script src="/websitetruyen/admin/assets/js/daterangepicker.min.js"></script>
		<script src="/websitetruyen/admin/assets/js/bootstrap-datetimepicker.min.js"></script>
		<script src="/websitetruyen/admin/assets/js/bootstrap-colorpicker.min.js"></script>
		<script src="/websitetruyen/admin/assets/js/jquery.knob.min.js"></script>
		<script src="/websitetruyen/admin/assets/js/autosize.min.js"></script>
		<script src="/websitetruyen/admin/assets/js/jquery.inputlimiter.min.js"></script>
		<script src="/websitetruyen/admin/assets/js/jquery.maskedinput.min.js"></script>
		<script src="/websitetruyen/admin/assets/js/bootstrap-tag.min.js"></script>

		<script src="/websitetruyen/admin/assets/js/markdown.min.js"></script>
		<script src="/websitetruyen/admin/assets/js/bootstrap-markdown.min.js"></script>
		<script src="/websitetruyen/admin/assets/js/jquery.hotkeys.index.min.js"></script>
		<script src="/websitetruyen/admin/assets/js/bootstrap-wysiwyg.min.js"></script>
		<script src="/websitetruyen/admin/assets/js/bootbox.js"></script>
    	<script src="/websitetruyen/admin/assets/js/jquery.gritter.min.js"></script>
        <script src="/websitetruyen/admin/assets/js/bootstrap-editable.min.js"></script>
        <script src="/websitetruyen/admin/assets/js/ace-editable.min.js"></script>
    <!-- ace scripts -->
    <script src="/websitetruyen/admin/assets/js/ace-elements.min.js"></script>
    <script src="/websitetruyen/admin/assets/js/ace.min.js"></script>
    <!-- inline scripts related to this page -->
    <script type="text/javascript">
      jQuery(function ($) {
        //initiate dataTables plugin
        var myTable = $("#dynamic-table")
          //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
          .DataTable({
            bAutoWidth: false,
            // aoColumns: [
            //   { bSortable: false },
            //   null,
            //   null,
            //   null,
            //   null,
            //   null,
            //   { bSortable: false },
            // ],
            aaSorting: [],

            //"bProcessing": true,
            //"bServerSide": true,
            //"sAjaxSource": "http://127.0.0.1/table.php"	,

            //,
            //"sScrollY": "200px",
            //"bPaginate": false,

            //"sScrollX": "100%",
            //"sScrollXInner": "120%",
            //"bScrollCollapse": true,
            //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
            //you may want to wrap the table inside a "div.dataTables_borderWrap" element

            //"iDisplayLength": 50

            select: {
              style: "multi",
            },
            "language": {
                    "sProcessing": "Đang xử lý...",
                    "sLengthMenu": "Xem _MENU_ mục",
                    "sZeroRecords": "Không tìm thấy dòng nào phù hợp",
                    "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục _START_ ",
                    "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
                    "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                    "sInfoPostFix": "",
                    "sSearch": "Tìm:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "Đầu",
                        "sPrevious": "Trước",
                        "sNext": "Tiếp",
                        "sLast": "Cuối"
                    },
                    select: {
                         rows: "/ %d số hàng được chọn trong danh sách"
                    }
                },
             "aLengthMenu": [5, 10, 15, 20, 25, 50, 100],
          });

        $.fn.dataTable.Buttons.defaults.dom.container.className =
          "dt-buttons btn-overlap btn-group btn-overlap";

        new $.fn.dataTable.Buttons(myTable, {
          buttons: [
            {
              extend: "colvis",
              text:
                "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Hiện thị/ Xóa Cột Trong Bảng</span>",
              className: "btn btn-white btn-primary btn-bold",
              columns: ":not(:first):not(:last)",
            },
            {
              extend: "copy",
              text:
                "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Sao Chép Dữ Liệu</span>",
              className: "btn btn-white btn-primary btn-bold",
            },
            {
              extend: "csv",
              text:
                "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Xuất Ra File CSV</span>",
              className: "btn btn-white btn-primary btn-bold",
            },
            {
              extend: "excel",
              text:
                "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Xuất Ra File Excel</span>",
              className: "btn btn-white btn-primary btn-bold",
            },
            {
              extend: "pdf",
              text:
                "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Xuất Ra File PDF</span>",
              className: "btn btn-white btn-primary btn-bold",
            },
            {
              extend: "print",
              text:
                "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>In</span>",
              className: "btn btn-white btn-primary btn-bold",
              autoPrint: false,
              message: "Hiện thị dữ liệu qua hiện thị",
            },
          ],
        });
        myTable.buttons().container().appendTo($(".tableTools-container"));

        //style the message box
        var defaultCopyAction = myTable.button(1).action();
        myTable.button(1).action(function (e, dt, button, config) {
          defaultCopyAction(e, dt, button, config);
          $(".dt-button-info").addClass(
            "gritter-item-wrapper gritter-info gritter-center white"
          );
        });

        var defaultColvisAction = myTable.button(0).action();
        myTable.button(0).action(function (e, dt, button, config) {
          defaultColvisAction(e, dt, button, config);

          if ($(".dt-button-collection > .dropdown-menu").length == 0) {
            $(".dt-button-collection")
              .wrapInner(
                '<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />'
              )
              .find("a")
              .attr("href", "#")
              .wrap("<li />");
          }
          $(".dt-button-collection").appendTo(
            ".tableTools-container .dt-buttons"
          );
        });

        ////

        setTimeout(function () {
          $($(".tableTools-container"))
            .find("a.dt-button")
            .each(function () {
              var div = $(this).find(" > div").first();
              if (div.length == 1)
                div.tooltip({ container: "body", title: div.parent().text() });
              else
                $(this).tooltip({ container: "body", title: $(this).text() });
            });
        }, 500);

        myTable.on("select", function (e, dt, type, index) {
          if (type === "row") {
            $(myTable.row(index).node())
              .find("input:checkbox")
              .prop("checked", true);
          }
        });
        myTable.on("deselect", function (e, dt, type, index) {
          if (type === "row") {
            $(myTable.row(index).node())
              .find("input:checkbox")
              .prop("checked", false);
          }
        });

        /////////////////////////////////
        //table checkboxes
        $("th input[type=checkbox], td input[type=checkbox]").prop(
          "checked",
          false
        );

        //select/deselect all rows according to table header checkbox
        $(
          "#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]"
        )
          .eq(0)
          .on("click", function () {
            var th_checked = this.checked; //checkbox inside "TH" table header

            $("#dynamic-table")
              .find("tbody > tr")
              .each(function () {
                var row = this;
                if (th_checked) myTable.row(row).select();
                else myTable.row(row).deselect();
              });
          });

        //select/deselect a row when the checkbox is checked/unchecked
        $("#dynamic-table").on("click", "td input[type=checkbox]", function () {
          var row = $(this).closest("tr").get(0);
          if (this.checked) myTable.row(row).deselect();
          else myTable.row(row).select();
        });

        $(document).on("click", "#dynamic-table .dropdown-toggle", function (
          e
        ) {
          e.stopImmediatePropagation();
          e.stopPropagation();
          e.preventDefault();
        });

        //And for the first simple table, which doesn't have TableTools or dataTables
        //select/deselect all rows according to table header checkbox
        var active_class = "active";
        $("#simple-table > thead > tr > th input[type=checkbox]")
          .eq(0)
          .on("click", function () {
            var th_checked = this.checked; //checkbox inside "TH" table header

            $(this)
              .closest("table")
              .find("tbody > tr")
              .each(function () {
                var row = this;
                if (th_checked)
                  $(row)
                    .addClass(active_class)
                    .find("input[type=checkbox]")
                    .eq(0)
                    .prop("checked", true);
                else
                  $(row)
                    .removeClass(active_class)
                    .find("input[type=checkbox]")
                    .eq(0)
                    .prop("checked", false);
              });
          });

        //select/deselect a row when the checkbox is checked/unchecked
        $("#simple-table").on("click", "td input[type=checkbox]", function () {
          var $row = $(this).closest("tr");
          if ($row.is(".detail-row ")) return;
          if (this.checked) $row.addClass(active_class);
          else $row.removeClass(active_class);
        });

        /********************************/
        //add tooltip for small view action buttons in dropdown menu
        $('[data-rel="tooltip"]').tooltip({ placement: tooltip_placement });

        //tooltip placement on right or left
        function tooltip_placement(context, source) {
          var $source = $(source);
          var $parent = $source.closest("table");
          var off1 = $parent.offset();
          var w1 = $parent.width();

          var off2 = $source.offset();
          //var w2 = $source.width();

          if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2))
            return "right";
          return "left";
        }

        /***************/
        $(".show-details-btn").on("click", function (e) {
          e.preventDefault();
          $(this).closest("tr").next().toggleClass("open");
          $(this)
            .find(ace.vars[".icon"])
            .toggleClass("fa-angle-double-down")
            .toggleClass("fa-angle-double-up");
        });
        /***************/

        /**
				//add horizontal scrollbars to a simple table
				$('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
				  {
					horizontal: true,
					styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
					size: 2000,
					mouseWheelLock: true
				  }
				).css('padding-top', '12px');
				*/
      });
    </script>
    <script type="text/javascript">
      jQuery(function ($) {
        $(".easy-pie-chart.percentage").each(function () {
          var $box = $(this).closest(".infobox");
          var barColor =
            $(this).data("color") ||
            (!$box.hasClass("infobox-dark")
              ? $box.css("color")
              : "rgba(255,255,255,0.95)");
          var trackColor =
            barColor == "rgba(255,255,255,0.95)"
              ? "rgba(255,255,255,0.25)"
              : "#E2E2E2";
          var size = parseInt($(this).data("size")) || 50;
          $(this).easyPieChart({
            barColor: barColor,
            trackColor: trackColor,
            scaleColor: false,
            lineCap: "butt",
            lineWidth: parseInt(size / 10),
            animate: ace.vars["old_ie"] ? false : 1000,
            size: size,
          });
        });

        $(".sparkline").each(function () {
          var $box = $(this).closest(".infobox");
          var barColor = !$box.hasClass("infobox-dark")
            ? $box.css("color")
            : "#FFF";
          $(this).sparkline("html", {
            tagValuesAttribute: "data-values",
            type: "bar",
            barColor: barColor,
            chartRangeMin: $(this).data("min") || 0,
          });
        });

        //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
        //but sometimes it brings up errors with normal resize event handlers
        $.resize.throttleWindow = false;

        var placeholder = $("#piechart-placeholder").css({
          width: "90%",
          "min-height": "150px",
        });
        var data = [
          { label: "social networks", data: 38.7, color: "#68BC31" },
          { label: "search engines", data: 24.5, color: "#2091CF" },
          { label: "ad campaigns", data: 8.2, color: "#AF4E96" },
          { label: "direct traffic", data: 18.6, color: "#DA5430" },
          { label: "other", data: 10, color: "#FEE074" },
        ];
        function drawPieChart(placeholder, data, position) {
          $.plot(placeholder, data, {
            series: {
              pie: {
                show: true,
                tilt: 0.8,
                highlight: {
                  opacity: 0.25,
                },
                stroke: {
                  color: "#fff",
                  width: 2,
                },
                startAngle: 2,
              },
            },
            legend: {
              show: true,
              position: position || "ne",
              labelBoxBorderColor: null,
              margin: [-30, 15],
            },
            grid: {
              hoverable: true,
              clickable: true,
            },
          });
        }
        drawPieChart(placeholder, data);

        /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
        placeholder.data("chart", data);
        placeholder.data("draw", drawPieChart);

        //pie chart tooltip example
        var $tooltip = $(
          "<div class='tooltip top in'><div class='tooltip-inner'></div></div>"
        )
          .hide()
          .appendTo("body");
        var previousPoint = null;

        placeholder.on("plothover", function (event, pos, item) {
          if (item) {
            if (previousPoint != item.seriesIndex) {
              previousPoint = item.seriesIndex;
              var tip =
                item.series["label"] + " : " + item.series["percent"] + "%";
              $tooltip.show().children(0).text(tip);
            }
            $tooltip.css({ top: pos.pageY + 10, left: pos.pageX + 10 });
          } else {
            $tooltip.hide();
            previousPoint = null;
          }
        });

        /////////////////////////////////////
        $(document).one("ajaxloadstart.page", function (e) {
          $tooltip.remove();
        });

        var d1 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.5) {
          d1.push([i, Math.sin(i)]);
        }

        var d2 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.5) {
          d2.push([i, Math.cos(i)]);
        }

        var d3 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.2) {
          d3.push([i, Math.tan(i)]);
        }

        var sales_charts = $("#sales-charts").css({
          width: "100%",
          height: "220px",
        });
        $.plot(
          "#sales-charts",
          [
            { label: "Domains", data: d1 },
            { label: "Hosting", data: d2 },
            { label: "Services", data: d3 },
          ],
          {
            hoverable: true,
            shadowSize: 0,
            series: {
              lines: { show: true },
              points: { show: true },
            },
            xaxis: {
              tickLength: 0,
            },
            yaxis: {
              ticks: 10,
              min: -2,
              max: 2,
              tickDecimals: 3,
            },
            grid: {
              backgroundColor: { colors: ["#fff", "#fff"] },
              borderWidth: 1,
              borderColor: "#555",
            },
          }
        );

        $('#recent-box [data-rel="tooltip"]').tooltip({
          placement: tooltip_placement,
        });
        function tooltip_placement(context, source) {
          var $source = $(source);
          var $parent = $source.closest(".tab-content");
          var off1 = $parent.offset();
          var w1 = $parent.width();

          var off2 = $source.offset();
          //var w2 = $source.width();

          if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2))
            return "right";
          return "left";
        }

        $(".dialogs,.comments").ace_scroll({
          size: 300,
        });

        //Android's default browser somehow is confused when tapping on label which will lead to dragging the task
        //so disable dragging when clicking on label
        var agent = navigator.userAgent.toLowerCase();
        if (ace.vars["touch"] && ace.vars["android"]) {
          $("#tasks").on("touchstart", function (e) {
            var li = $(e.target).closest("#tasks li");
            if (li.length == 0) return;
            var label = li.find("label.inline").get(0);
            if (label == e.target || $.contains(label, e.target))
              e.stopImmediatePropagation();
          });
        }

        $("#tasks").sortable({
          opacity: 0.8,
          revert: true,
          forceHelperSize: true,
          placeholder: "draggable-placeholder",
          forcePlaceholderSize: true,
          tolerance: "pointer",
          stop: function (event, ui) {
            //just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
            $(ui.item).css("z-index", "auto");
          },
        });
        $("#tasks").disableSelection();
        $("#tasks input:checkbox")
          .removeAttr("checked")
          .on("click", function () {
            if (this.checked) $(this).closest("li").addClass("selected");
            else $(this).closest("li").removeClass("selected");
          });

        //show the dropdowns on top or bottom depending on window height and menu position
        $("#task-tab .dropdown-hover").on("mouseenter", function (e) {
          var offset = $(this).offset();

          var $w = $(window);
          if (offset.top > $w.scrollTop() + $w.innerHeight() - 100)
            $(this).addClass("dropup");
          else $(this).removeClass("dropup");
        });
      });
    </script>

    <script type="text/javascript">
      jQuery(function ($) {
        var demo1 = $(
          'select[name="duallistbox_demo1[]"]'
        ).bootstrapDualListbox({
          infoTextFiltered:
            '<span class="label label-purple label-lg">Filtered</span>',
        });
        var container1 = demo1.bootstrapDualListbox("getContainer");
        container1.find(".btn").addClass("btn-white btn-info btn-bold");

        /**var setRatingColors = function() {
					$(this).find('.star-on-png,.star-half-png').addClass('orange2').removeClass('grey');
					$(this).find('.star-off-png').removeClass('orange2').addClass('grey');
				}*/
        $(".rating").raty({
          cancel: true,
          half: true,
          starType: "i",
          /**,
					
					'click': function() {
						setRatingColors.call(this);
					},
					'mouseover': function() {
						setRatingColors.call(this);
					},
					'mouseout': function() {
						setRatingColors.call(this);
					}*/
        }); //.find('i:not(.star-raty)').addClass('grey');

        //////////////////
        //select2
        $(".select2").css("width", "200px").select2({ allowClear: true });
        $("#select2-multiple-style .btn").on("click", function (e) {
          var target = $(this).find("input[type=radio]");
          var which = parseInt(target.val());
          if (which == 2) $(".select2").addClass("tag-input-style");
          else $(".select2").removeClass("tag-input-style");
        });

        //////////////////
        $(".multiselect").multiselect({
          enableFiltering: true,
          enableHTML: true,
          buttonClass: "btn btn-white btn-primary",
          templates: {
            button:
              '<button type="button" class="multiselect dropdown-toggle" data-toggle="dropdown"><span class="multiselect-selected-text"></span> &nbsp;<b class="fa fa-caret-down"></b></button>',
            ul: '<ul class="multiselect-container dropdown-menu"></ul>',
            filter:
              '<li class="multiselect-item filter"><div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span><input class="form-control multiselect-search" type="text"></div></li>',
            filterClearBtn:
              '<span class="input-group-btn"><button class="btn btn-default btn-white btn-grey multiselect-clear-filter" type="button"><i class="fa fa-times-circle red2"></i></button></span>',
            li: '<li><a tabindex="0"><label></label></a></li>',
            divider: '<li class="multiselect-item divider"></li>',
            liGroup:
              '<li class="multiselect-item multiselect-group"><label></label></li>',
          },
        });

        ///////////////////

        //typeahead.js
        //example taken from plugin's page at: https://twitter.github.io/typeahead.js/examples/
        var substringMatcher = function (strs) {
          return function findMatches(q, cb) {
            var matches, substringRegex;

            // an array that will be populated with substring matches
            matches = [];

            // regex used to determine if a string contains the substring `q`
            substrRegex = new RegExp(q, "i");

            // iterate through the pool of strings and for any string that
            // contains the substring `q`, add it to the `matches` array
            $.each(strs, function (i, str) {
              if (substrRegex.test(str)) {
                // the typeahead jQuery plugin expects suggestions to a
                // JavaScript object, refer to typeahead docs for more info
                matches.push({ value: str });
              }
            });

            cb(matches);
          };
        };

        $("input.typeahead").typeahead(
          {
            hint: true,
            highlight: true,
            minLength: 1,
          },
          {
            name: "states",
            displayKey: "value",
            source: substringMatcher(ace.vars["US_STATES"]),
            limit: 10,
          }
        );

        ///////////////

        //in ajax mode, remove remaining elements before leaving page
        $(document).one("ajaxloadstart.page", function (e) {
          $("[class*=select2]").remove();
          $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox(
            "destroy"
          );
          $(".rating").raty("destroy");
          $(".multiselect").multiselect("destroy");
        });
      });
    </script>
    <script type="text/javascript">
    $("#theloai").keyup(function(){
        var str = $(this).val();
        var trims = $.trim(str);
        // trims.replace(/[^a-z0-9]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '-');
        var slug = trims
        .replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, "a")
        .replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, "e")
        .replace(/i|í|ì|ỉ|ĩ|ị/gi, "i")
        .replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, "o")
        .replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, "u")
        .replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, "y")
        .replace(/đ/gi, "d")
        .replace(
            /\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi,
            ""
        )
        .replace(/ /gi, "-")
        .replace(/\-\-\-\-\-/gi, "")
        .replace(/\-\-\-\-/gi, "-")
        .replace(/\-\-\-/gi, "-")
        .replace(/\-\-/gi, "-")
        .replace(/\@\-|\-\@|\@/gi, "");
        $('#slug').val(slug.toLowerCase())
    });
</script>
  </body>
</html>
<?php ob_end_flush(); ?>