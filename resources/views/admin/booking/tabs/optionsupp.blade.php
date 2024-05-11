<div class="card mt-50">
    <div class="card-body">
        <div class="row">
            <table class="mt-3 col-md-10">
                <thead>
                    <tr>
                        <th>@lang('Option :')</th>
                        <th>@lang('Quantité :')</th>
                        <th>@lang('Prix :(MAD)')</th>
                        <th>@lang('Type :')</th>
                        <th>@lang('Total :(MAD)')</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select name="option_id[]" class="form-control">
                                <option disabled selected>Selectionnez Option</option>
                                @foreach ($options as $option)
                                    <option value="{{ $option->id }}">{{ $option->nom }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="number" name="quantite[]" class="form-control">
                        </td>
                        <td>
                            <input type="number" name="prix[]" class="form-control">
                        </td>
                        <td>
                            <select class="form-control" name="type_paiement[]">
                                <option disabled selected>Selectionnez Type</option>
                                @foreach (optionmode() as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="number" name="amount[]" class="form-control">
                        </td>
                        <td>
                            <a href="javascript:void(0)" class="icon-btn btn--danger ml-1 deleteBtn">
                                <i class="la la-trash"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="col-md-2 position-relative">
                <a href="javascript:void(0)" class="btn btn-sm btn--primary text-white text--small position-absolute add-option" style="right: 0">
                    <i class="fa fa-fw fa-plus"></i>
                    @lang('Ajouter Option')
                </a>
            </div>
        </div>
    </div>
</div>
