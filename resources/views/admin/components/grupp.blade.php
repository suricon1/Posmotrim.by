<tr>
    <td></td>
    <td colspan="6" style="padding: 0;">
        <div class="card card-default collapsed-card">
            <div class="card-header">
                <h3 class="card-title">Группа постов</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>

            <div class="card-body" style="padding: 0;">

                @include('admin.components.table', ['posts' => $grups])

            </div>
        </div>
    </td>
</tr>