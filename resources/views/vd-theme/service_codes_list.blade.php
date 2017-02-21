<div ng-controller="ServiceCodePageController">

    <div class="col-md-6">
        <div class="form-group">
            <label>Выборка по сервису:</label>
            <select class="form-control" ng-model="service.id">
                <option value="">All</option>
                <option ng-repeat="st in serviceCodeTypes.data" value="@{{ st.id}}">@{{ st.name }}</option>
            </select>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Поиск по сервис коду:</label>
            <input type="text" class="form-control" id="focusedInput" ng-model="query">
        </div>
    </div>

    <div class="col-md-12">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Сервис код
                    <button class="btn btn-mini btn-link" ng-click="sort('code_id')"><i class="fa fa-sort"></i></button>
                </th>
                <th>Описание
                    <button class="btn btn-mini btn-link" ng-click="sort('name')"><i class="fa fa-sort"></i></button>
                </th>
            </tr>
            </thead>
            <tbody>

            <tr ng-repeat="sc in serviceCodes.data | orderBy:orderProp:direction | filter: {code_id: query,  sct_id: service.id}">
                <td>@{{ sc.code_id }}</td>
                <td>@{{ sc.name }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>