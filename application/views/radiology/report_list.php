<table id="reports-search"
       class="table table-bordered table-hover dataTable"
       role="grid" aria-describedby="example2_info">
    <thead>
    <tr role="row">
        <th class="sorting_asc" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1" aria-sort="ascending"
            aria-label="Rendering engine: activate to sort column descending">
            Report#
        </th>
        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="Platform(s): activate to sort column ascending">
            Report Name
        </th>
        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="Platform(s): activate to sort column ascending">
            ReportType
        </th>
        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="Platform(s): activate to sort column ascending">
            Comments
        </th>
        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="CSS grade: activate to sort column ascending">
            Actions
        </th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($report_list)) {
        foreach ($report_list as $index=>$r_key) { ?>
            <tr role="row" class="odd">
                <td class="sorting_1" id="regNo"><?php echo $index + 1; ?>
                    <input type="hidden" class="reportID" value="<?php echo $r_key['reportId']; ?>">
                </td>
                <td><?php echo $r_key['reportName']; ?></td>
                <td><?php echo $r_key['reportType']; ?></td>
                <td style="word-break: break-word;"><?php echo $r_key['reportComments']; ?></td>
                <td>

                    <a href="<?php echo base_url('/assets/dist/img/reports/') . $r_key['reportPath']; ?>" data-toggle="lightbox" class="btn btn-default">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                    <button class="btn btn-default delete-report">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            <?php
        }
    }
    ?>
    </tbody>
    <tfoot>

    </tfoot>
</table>