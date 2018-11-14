<table id="admitted-patient-search"
       class="table table-bordered table-hover dataTable"
       role="grid" aria-describedby="example2_info">
    <thead>
    <tr role="row">
        <th class="sorting_asc" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1" aria-sort="ascending"
            aria-label="Rendering engine: activate to sort column descending">
            Patient MR#
        </th>
        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="Browser: activate to sort column ascending">Patient
            Name
        </th>
        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="Platform(s): activate to sort column ascending">Next
            of Kin
        </th>
        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="Platform(s): activate to sort column ascending">Sex
        </th>

        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="Engine version: activate to sort column ascending">
            Bed Number
        </th>
        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="Engine version: activate to sort column ascending">
            Ward Number
        </th>
        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="Engine version: activate to sort column ascending">
            Disease
        </th>
        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="Platform(s): activate to sort column ascending">
            Admission Date
        </th>
        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="Platform(s): activate to sort column ascending">
            Status
        </th>

        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="CSS grade: activate to sort column ascending">
            Actions
        </th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($patients as $patient) { ?>
        <tr role="row" class="odd">
            <td class="sorting_1" id="regNo"><?php echo $patient['regNo']; ?></td>
            <td><?php echo $patient['patName']; ?></td>
            <td><?php echo $patient['patNoK']; ?></td>
            <td><?php echo $patient['patSex']; ?></td>
            <?php $bed_list = $this->model_hms->get_bed_by_id($patient['patbed_id']); ?>
            <td><?php echo $bed_list->bedNo; ?></td>
            <?php $ward_list = $this->model_hms->get_ward_by_id($patient['patward_id']); ?>
            <td><?php echo $ward_list->wardName; ?></td>
            <td><?php $disease = $this->model_hms->get_disease_by_id($patient['patDisease_id']);
                echo $disease->disease_name;
                ?></td>
            <td><?php
                $date = $patient['patAdmDate'];
                $datetime = date(' d-m-Y h:i a', strtotime($date));
                echo $datetime;
                ?></td>
            <td><?php echo $patient['patStatus']; ?></td>

            <td style="display:inline-flex;">
                <a target="_blank" data-toggle="modal"
                   class="btn btn-default"
                   href="<?php echo base_url('dashboard/page_print/') . "?search_by_cnic=" . $patient['regNo']; ?>"><i
                        class="fa fa-print"
                        aria-hidden="true"></i></a>
                &nbsp;
                <a target="_blank" data-toggle="modal"
                   class="btn btn-default"
                   href="<?php echo base_url('dashboard/patient_chart/') . "?search_by_cnic=" . $patient['regNo']; ?>"><i
                        class="fa fa-eye"
                        aria-hidden="true"></i></a>
                &nbsp;
                <a target="_blank" data-toggle="modal"
                   class="btn btn-default"
                   href="<?php echo base_url('dashboard/edit_patient/') . "?search_by_cnic=" . $patient['regNo']; ?>"><i
                        class="fa fa-pencil-square-o"
                        aria-hidden="true"></i></a>
                <?php if ($patient['patStatus'] == 'Under Treatment') { ?>
                    &nbsp;
                    <button type="button"
                            class="btn btn-default delete-patient"><i
                            class="fa fa-ban"></i></button>
                <?php } else { ?>
                    &nbsp;
                    <a target="_blank" data-toggle="modal"
                       class="btn btn-default"
                       href="<?php echo base_url('dashboard/page_print/') . "?search_by_cnic=" . $patient['regNo']; ?>"><i
                            class="fa fa-print"
                            aria-hidden="true"></i></a>
                <?php } ?>
            </td>
        </tr>
    <?php } ?>


    </tbody>
    <tfoot>

    </tfoot>
</table>