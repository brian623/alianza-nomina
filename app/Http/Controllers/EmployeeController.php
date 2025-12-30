<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->paginate(5);

        $columns = [
            'checkbox',
            'Nombre',
            'Identificación',
            'Dirección',
            'Teléfono',
            'Ciudad',
            'Departamento',
        ];

        $rows = $employees->map(function ($employee) {
            return [
                'id'           => $employee->id,
                'checkbox'     => false,
                'Nombre'       => $employee->first_name,
                'Apellido'     => $employee->last_name,
                'Identificación'=> $employee->identification,
                'Dirección'    => $employee->address ?? '—',
                'Teléfono'     => $employee->phone ?? '—',
                'Ciudad'       => $employee->city_id ?? '—',
                'Departamento' => $employee->department_id ?? '—',
                'actions'      => true,
            ];
        });

        return view('employees.index', compact(
            'employees',
            'columns',
            'rows'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'identification' => [
                'required',
                'string',
                'max:50',
                Rule::unique('employees', 'identification')
                    ->whereNull('deleted_at'),
            ],
            'phone' => 'nullable|string|max:20',
            'city_id' => 'nullable|string|max:255',
            'department_id' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);


        Employee::create($validated);

        return redirect()
            ->route('employees.index')
            ->with('success', 'Empleado creado correctamente');
    }

    public function update(Request $request, Employee $employee)
    {
        // Validar los datos
        $validated = $request->validate([
            'first_name'     => 'required|string|max:255',
            'last_name'      => 'required|string|max:255',
            'identification' => 'required|string|max:50|unique:employees,identification,' . $employee->id,
            'phone'          => 'nullable|string|max:20',
            'address'        => 'nullable|string|max:255',
            'city_id'        => 'nullable|string|max:255',
            'department_id'  => 'nullable|string|max:255',
        ]);

        // Actualizar el empleado
        $employee->update($validated);

        // Redirigir a la lista con mensaje de éxito
        return redirect()
            ->route('employees.index')
            ->with('success', 'Empleado actualizado correctamente');
    }

    public function bulkDelete(Request $request)
    {
         $request->validate([
            'ids' => 'required|string', // IDs vienen separados por coma
        ]);
        $ids = explode(',', $request->ids);

        Employee::whereIn('id', $ids)->delete();

        return redirect()->route('employees.index')
                        ->with('success', 'Empleados eliminados correctamente.');
    }

    public function destroy($id)
    {
        Employee::findOrFail($id)->delete();
        return redirect()->route('employees.index')->with('success', 'Empleado eliminado correctamente');
    }
}
