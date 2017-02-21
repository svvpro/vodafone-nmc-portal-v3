<div ng-controller="PhonebookPagePageController">

    <div class="col-md-6">
        <div class="form-group">
            <label>Выборка по Отделу/Группе:</label>
            <select class="form-control" ng-model="depart.name">
                <option value="">All</option>
                <option ng-repeat="depart in departaments.data" value="@{{ depart.name}}">@{{ depart.name }}</option>
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
                <th>Фамилия
                    <button class="btn btn-mini btn-link" ng-click="sort('surname')"><i class="fa fa-sort"></i></button>
                </th>
                <th>Имя
                    <button class="btn btn-mini btn-link" ng-click="sort('name')"><i class="fa fa-sort"></i></button>
                </th>
                <th>Отчество
                    <button class="btn btn-mini btn-link" ng-click="sort('middle_name')"><i class="fa fa-sort"></i></button>
                </th>
                <th>PBX
                    <button class="btn btn-mini btn-link" ng-click="sort('pbx')"><i class="fa fa-sort"></i></button>
                </th>
                <th>Моб.тел
                    <button class="btn btn-mini btn-link" ng-click="sort('mobile_phone')"><i class="fa fa-sort"></i></button>
                </th>
                <th>E-mail
                    <button class="btn btn-mini btn-link" ng-click="sort('email')"><i class="fa fa-sort"></i></button>
                </th>
                <th>Отдел/Группа
                    <button class="btn btn-mini btn-link" ng-click="sort('departament_id')"><i class="fa fa-sort"></i></button>
                </th>
            </tr>
            </thead>
            <tbody>

            <tr ng-repeat="engineer in engineers.data | orderBy:orderProp:direction | filter: {surname: query,  departament_id : depart.name}">
                <td>@{{ engineer.surname }}</td>
                <td>@{{ engineer.name }}</td>
                <td>@{{ engineer.middle_name }}</td>
                <td>@{{ engineer.pbx }}</td>
                <td>@{{ engineer.mobile_phone }}</td>
                <td>@{{ engineer.email }}</td>
                <td>@{{ engineer.departament_id }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>