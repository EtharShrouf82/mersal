<div class="row">
    <div class="col-12">
        <span class="btn btn-primary">
            <input id="checkAll" class="form-check-input" type="checkbox" value="">
            <label class="form-check-label" for="checkAll">
                إختيار الجميع
            </label>
        </span>
    </div>
    <br/>
    <hr/>
    <br/>
    @foreach($permissions as $permission)
        <div class="col-4 mb-2">
            <div class="card">
                <div class="card-header">
                    <li class="list-group-item">
                        <div class="float-right">
                            <input
                                onclick="checkChecked({{ $permission->id }})"
                                name="permissions[]"
                                class="form-check-input perm{{ $permission->id }}"
                                id="checkId{{ $permission->id }}"
                                type="checkbox"
                                @if($type == 'edit')
                                    {{ $role->permissions->contains($permission) ? 'checked' : '' }}
                                @endif
                                value="{{ $permission->id }}">
                            <label class="form-check-label" for="{{ $permission->id }}">
                                {{ $permission->alias }}
                            </label>
                        </div>
                        <div class="float-left">
                            <div class="sp_badge">
                                <input
                                    onclick="checkUnCheck('{{$permission->id}}')"
                                    id="id{{ $permission->id }}"
                                    class="form-check-input p{{$permission->id}}"
                                    type="checkbox"
                                    value="{{ $permission->id }}"
                                >
                                <label class="form-check-label" for="{{ $permission->id }}">
                                    الجميع
                                </label>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </li>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($permission->children as $child)
                        <li class="list-group-item">
                            <input
                                onclick="checkParent('{{ $permission->id }}')"
                                class="form-check-input perm{{ $permission->id }}"
                                id="{{ $child->id }}"
                                name="permissions[]"
                                type="checkbox"
                                @if($type == 'edit')
                                    {{ $role->permissions->contains($child) ? 'checked' : '' }}
                                @endif
                                value="{{ $child->id }}">
                            <label class="form-check-label" for="{{ $child->id }}">
                                {{ $child->alias }}
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach
</div>
