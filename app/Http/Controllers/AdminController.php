<?php

namespace App\Http\Controllers;

use App\Models\Givings;

use Illuminate\Http\Request;

use App\Models\Members;

use App\Models\User;

use App\Models\Inventory;

use App\Models\Schedule;

use App\Models\Event;

use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;

//Human Resource
use App\Models\Employees;
use App\Models\ewallet_deposits;
use App\Models\Projects;
use App\Models\Transactions;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function view_members()
    {
        return view('admin.members');
    }

    public function time_management()
    {
        return view('admin.time_management');
    }

    public function view_givings()
    {
        return view('admin.givings');
    }

    public function see_members()
    {

        $data = members::all();

        $memberCount = members::count(); // Count the number of members

        return view('admin.seemember', compact('data', 'memberCount'));
    }


    public function see_givings()
    {
        $givings = Givings::all();
        $givingCount = Givings::count(); // Count the number of givings

        return view('admin.seegivings', compact('givings', 'givingCount'));
    }

    public function see_users()
    {
        $users = User::all();
        $userCount = User::count(); // Count the number of users

        return view('admin.seeusers', compact('users', 'userCount'));
    }

    public function add_members(Request $request)
    {
        $data = new members;
        $data->fname = $request->fname;
        $data->mname = $request->mname;
        $data->lname = $request->lname;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->mobile = $request->mobile;
        $data->occupation = $request->occupation;
        $data->registeras = $request->registeras;
        $data->registrationdate = $request->registrationdate;
        $data->gender = $request->gender;
        $data->birthday = $request->birthday;
        $data->ministry = $request->ministry;
        $data->marital = $request->marital;
        $data->save();

        return redirect()->back()->with('message', 'Member Added Successfully');
    }
    public function add_givings(Request $request)
    {

        $givings = new Givings;
        $givings->fname = $request->fname;
        $givings->mname = $request->mname;
        $givings->lname = $request->lname;
        $givings->giving = $request->giving;
        $givings->amount = $request->amount;
        $givings->mobile = $request->mobile;
        $givings->comment = $request->comment;
        $givings->save();

        return redirect()->back()->with('message', 'Giving Received Successfully');
    }
    public function delete_members($id)
    {
        $data = members::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Member Deleted Successfully');
    }

    public function delete_givers($id)
    {
        $givings = Givings::find($id);
        $givings->delete();
        return redirect()->back()->with('message', 'Giving Deleted Successfully');
    }

    public function delete_users($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect()->back()->with('message', 'User Deleted Successfully');
    }

    public function view_inventory()
    {
        $inventory = Inventory::all();
        return view('admin.inventory', compact('inventory'));
    }
    
    public function weekly_schedule()
    {
        $schedule = Schedule::all();
        return view('admin.weekly_schedule', compact('schedule'));
    }

    public function insert_schedule()
    {
        $schedule = Schedule::all();
        return view('admin.add_schedule', compact('schedule'));
    }

    public function insert_event()
    {
        $event = Event::all();
        $hours = range(0, 23); 
        $minutes = range(0, 59); 
        return view('admin.addevent', compact('event', 'hours', 'minutes'));
    }

    public function add_inventory(Request $request)
    {

        $inventory = new Inventory;
        $inventory->title = $request->title;
        $inventory->description = $request->description;
        $inventory->price = $request->price;
        $inventory->quantity = $request->quantity;
        $inventory->category = $request->category;
        $inventory->condition = $request->condition;
        $inventory->serial_number = $request->serial_number;
        $inventory->purchase_date = $request->purchase_date;
        $inventory->qr_code = $request->qr_code;
        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('inventory', $imagename);
        $inventory->image = $imagename;
        $inventory->save();

        return redirect()->back()->with('message', 'Equipment Added Successfully');
    }

    public function add_event(Request $request)
    {

        $event = new Event;
        $event->name = $request->name;
        $event->details = $request->details;
        $event->countdown_hours = $request->countdown_hours;
        $event->countdown_minutes = $request->countdown_minutes;
        $event->countdown_seconds = $request->countdown_minutes;
        $event->added_by = $request->added_by;
        $event->save();

        return redirect()->back()->with('message', 'Event Added Successfully');
    }

    public function show_inventory()
    {

        $inventory = Inventory::all();
        $inventoryCount = Inventory::count(); // Count the number of inventory
        return view('admin.show_inventory', compact('inventory', 'inventoryCount'));
    }

    public function delete_inventory($id)
    {
        $inventory = Inventory::find($id);
        $inventory->delete();
        return redirect()->back()->with('message', 'Equipment Deleted Successfully');
    }

    
    public function add_schedule(Request $request)
    {

        $schedule = new Schedule;
        $schedule->date = $request->date;
        $schedule->theme = $request->theme;
        $schedule->elder_on_duty_1 = $request->elder_on_duty_1;
        $schedule->elder_on_duty_2 = $request->elder_on_duty_2;
        $schedule->save();
        return redirect()->back()->with('message', 'Schedule Added Successfully');
    }

  // In ScheduleController.php
public function view_schedule($id)
{
    $item = Schedule::findOrFail($id);
    return view('admin.view_schedule', compact('item'));
}

    public function delete_schedule($id)
    {
        $inventory = Inventory::find($id);
        $inventory->delete();
        return redirect()->back()->with('message', 'Equipment Deleted Successfully');
    }


    public function update_member($id)
    {

        $data = members::find($id);
        return view('admin.updatemember', compact('data'));
    }

    public function update_registered(Request $request, $id)
    {
        $data = Members::find($id);

        $data->fname = $request->fname;

        $data->mname = $request->mname;

        $data->lname = $request->lname;

        $data->email = $request->email;

        $data->address = $request->address;

        $data->mobile = $request->mobile;

        $data->ministry = $request->ministry;

        $data->registeras = $request->registeras;

        $data->registrationdate = $request->registrationdate;

        $data->gender = $request->gender;

        $data->birthday = $request->birthday;

        $data->marital = $request->marital;

        $data->save();

        return redirect()->back()->with('message', 'Member Updated Successfully');
    }

    public function update_user($id)
    {

        $users = User::find($id);
        return view('admin.updateuser', compact('users'));
    }

    public function update_users(Request $request, $id)
    {
        $users = User::find($id);

        $users->name = $request->name;

        $users->email = $request->email;

        $users->gender = $request->gender;

        $users->email = $request->email;

        $users->birthday = $request->birthday;

        $users->address = $request->address;

        $users->save();

        return redirect()->back()->with('message', 'User Updated Successfully');
    }



    public function update_inventory($id)
    {

        $inventory = Inventory::find($id);
        return view('admin.update_inventory', compact('inventory'));
    }

    public function update_equipment(Request $request, $id)
    {
        $inventory = Inventory::find($id);

        $inventory->title = $request->title;

        $inventory->description = $request->description;

        $inventory->price = $request->price;

        $inventory->quantity = $request->quantity;

        $inventory->category = $request->category;

        $inventory->condition = $request->condition;

        $inventory->serial_number = $request->serial_number;

        $inventory->qr_code = $request->qr_code;

        $inventory->purchase_date = $request->purchase_date;

        $image = $request->image;

        if ($image) {

            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->image->move('inventory', $imagename);

            $inventory->image = $imagename;
        }

        $inventory->save();

        return redirect()->back()->with('message', 'Equipment Updated Successfully');
    }

    //Human Resource

    public function create_employee(Request $request)
    {
        $data = new employees;
        $data->name  = $request->name ;
        $data->gender = $request->gender ;
        $data->address = $request->address ;
        $data->marital_status = $request->marital_status ;
        $data->birthday = $request->birthday;
        $data->department = $request->department ;
        $data->position = $request->position ;
        $data->account_number  = $request->account_number ;
        $data->mobile = $request->mobile ;
        $data->email = $request->email ;
        $data->save();

        return redirect()->back()->with('message', 'Employee Added Successfully');
    }

    public function delete_employees($id)
    {
        $employee = Employees::find($id);
        $employee->delete();
        return redirect()->back()->with('message', 'Employee Deleted Successfully');
    }
    
    public function deleteprojects($id)
    {
        $project = Projects::find($id);
        if ($project) {
            $project->delete();
            return redirect()->back()->with('message', 'Project Deleted Successfully');
        }
        return redirect()->back()->with('message', 'Project Not Found');
    }
    
    // public function depositamount(Request $request)
    // {
    //     $data = update ewallet_deposits;
        
    //     $data->amount  = $request->amount ;
    //     $data->source = $request->source ;
        
    //     $data->save();

    //     return redirect()->back()->with('message', 'Amount Added Successfully');
    // }

    public function depositamount(Request $request)
{
    // Validate request inputs
    $request->validate([
        'amount' => 'required|numeric|min:0',
        'source' => 'required|string|in:FNB,Zanaco,Mobile Money', // Assuming only these 3 sources are valid
    ]);

    // Check if a deposit already exists for the given source
    $deposit = ewallet_deposits::where('source', $request->source)->first();

    if ($deposit) {
        // If a deposit exists, add the new amount to the existing amount
        $deposit->amount += $request->amount;
    } else {
        // If no deposit exists, create a new entry for the source
        $deposit = new ewallet_deposits();
        $deposit->amount = $request->amount;
        $deposit->source = $request->source;
    }

    // Save the deposit
    $deposit->save();

    // Redirect back with a success message
    return redirect()->back()->with('message', 'Amount Added Successfully');
}


    public function update_employee($id)
    {
        $employees = Employees::find($id);
        return view('admin.update_employee', compact('employees'));
    }
    public function index()
    {
        $employees = Employees::all(); // Fetch all employees
        return response()->json($employees);
    }

    public function employee()
    {
        $employees = Employees::all();
        $employeesCount = Employees::count(); 

        return view('admin.employee', compact('employees', 'employeesCount'));
    }

    public function payroll()
    {
        $employees = Employees::all();
        $employeesCount = Employees::count(); 

        return view('admin.payroll', compact('employees', 'employeesCount'));
    }

    public function ewallet()
    {
        // Sum the amounts for each source of deposits
        $FNB = ewallet_deposits::where('source', 'FNB')->sum('amount');
        $Zanaco = ewallet_deposits::where('source', 'Zanaco')->sum('amount');
        $mobile = ewallet_deposits::where('source', 'Mobile Money')->sum('amount');
    
        // Pass the results to the view
        return view('admin.ewallet', compact('FNB', 'Zanaco', 'mobile'));
    }
    
    public function human_resource()
    {
        return view('admin.human_resource');
    }

   

    public function add_employee(Request $request)
    {
        return view('admin.add_employee');
    }

    

    public function edit_employee()
    {
        return view('admin.edit_employee');
    }

    public function payments()
    {
        $transactions = Transactions::all();
        return view('admin.payments', compact('transactions'));
    }

    public function deposit()
    {
        return view('admin.deposit');
    }

    public function payEmployee(Request $request)
    {
        $employeeId = $request->employee;
        $amountToPay = $request->amount;
        $type = $request->type;
    
        // Get the employee name for record purposes
        $employee = Employees::find($employeeId);
    
        // Sum the amounts for each source of deposits
        $FNB = ewallet_deposits::where('source', 'FNB')->sum('amount');
        $Zanaco = ewallet_deposits::where('source', 'Zanaco')->sum('amount');
        $mobile = ewallet_deposits::where('source', 'Mobile Money')->sum('amount');
    
        switch ($type) {
            case 'FNB':
                if ($FNB >= $amountToPay) {
                    // Deduct the amount from the FNB source and save the updated value
                    ewallet_deposits::where('source', 'FNB')->decrement('amount', $amountToPay);
                  
                    // Insert transaction record
                    Transactions::create([
                        'name' => $employee->name,
                        'amount' => $amountToPay,
                        'account' => 'FNB',
                        'date' => now()
                    ]);
    
                    return redirect()->back()->with('message', 'Payment successfully processed with FNB.');
                } else {
                    return redirect()->back()->with('message', 'Insufficient funds in FNB.');
                }
                break;
    
            case 'Zanaco':
                if ($Zanaco >= $amountToPay) {
                    // Deduct the amount from the Zanaco source and save the updated value
                    ewallet_deposits::where('source', 'Zanaco')->decrement('amount', $amountToPay);
    
                    // Insert transaction record
                    Transactions::create([
                        'name' => $employee->name,
                        'amount' => $amountToPay,
                        'account' => 'Zanaco',
                        'date' => now()
                    ]);
    
                    return redirect()->back()->with('message', 'Payment successfully processed with Zanaco.');
                } else {
                    return redirect()->back()->with('message', 'Insufficient funds in Zanaco.');
                }
                break;
    
            case 'Mobile Money':
                if ($mobile >= $amountToPay) {
                    // Deduct the amount from the Mobile Money source and save the updated value
                    ewallet_deposits::where('source', 'Mobile Money')->decrement('amount', $amountToPay);
    
                    // Insert transaction record
                    Transactions::create([
                        'name' => $employee->name,
                        'amount' => $amountToPay,
                        'account' => 'Mobile Money',
                        'date' => now()
                    ]);
    
                    return redirect()->back()->with('message', 'Payment successfully processed with Mobile Money.');
                } else {
                    return redirect()->back()->with('message', 'Insufficient funds in Mobile Money.');
                }
                break;
    
            default:
                return redirect()->back()->with('message', 'Invalid payment type.');
        }
    }
    


//     public function payEmployee(Request $request)
// {
//     $employeeId = $request->employee;
//     $amountToPay = $request->amount;
//     $type = $request->type;

//     // Sum the amounts for each source of deposits
//     $FNB = ewallet_deposits::where('source', 'FNB')->sum('amount');
//     $Zanaco = ewallet_deposits::where('source', 'Zanaco')->sum('amount');
//     $mobile = ewallet_deposits::where('source', 'Mobile Money')->sum('amount');

//     switch ($type) {
//         case 'FNB':
//             if ($FNB >= $amountToPay) {
//                 // Deduct the amount from the FNB source and save the updated value
//                 ewallet_deposits::where('source', 'FNB')->decrement('amount', $amountToPay);

//                 return redirect()->back()->with('message', 'Payment successfully processed with FNB.');
//             } else {
//                 return redirect()->back()->with('message', 'Insufficient funds in FNB.');
//             }
//             break;

//         case 'Zanaco':
//             if ($Zanaco >= $amountToPay) {
//                 // Deduct the amount from the Zanaco source and save the updated value
//                 ewallet_deposits::where('source', 'Zanaco')->decrement('amount', $amountToPay);

//                 return redirect()->back()->with('message', 'Payment successfully processed with Zanaco.');
//             } else {
//                 return redirect()->back()->with('message', 'Insufficient funds in Zanaco.');
//             }
//             break;

//         case 'Mobile Money':
//             if ($mobile >= $amountToPay) {
//                 // Deduct the amount from the Mobile Money source and save the updated value
//                 ewallet_deposits::where('source', 'Mobile Money')->decrement('amount', $amountToPay);

//                 return redirect()->back()->with('message', 'Payment successfully processed with Mobile Money.');
//             } else {
//                 return redirect()->back()->with('message', 'Insufficient funds in Mobile Money.');
//             }
//             break;

//         default:
//             return redirect()->back()->with('message', 'Invalid payment type.');
//     }
// }

public function projects()
{
    $newprojects = Projects::where('status', '=', 'new')->get();
    $pendingprojects = Projects::where('status', '=', 'pending')->get();
    $completedprojects = Projects::where('status', '=', 'completed')->get();

    return view('admin.projects', compact('newprojects','pendingprojects','completedprojects'));
}

public function addproject()
{
    return view('admin.addproject');
}

public function createproject(Request $request)
{
    $data = new Projects;
    $data->name  = $request->name;
    $data->description = $request->description;
    $data->duration = $request->duration;
    $data->cost = $request->cost;
    $data->status = $request->status;
    
    $data->save();

    return redirect()->back()->with('message', 'Employee Added Successfully');
}
public function editproject($id)
{
    $projects = Projects::find($id);
    return view('admin.editproject', compact('projects'));
}
public function updateproject($id)
{
    $project = Projects::find($id);
    return view('admin.editproject', compact('projects'));
}
// public function updateproject(Request $request, $id)
// {
//     $project = Projects::find($id);
//     if ($project) {
//         $project->name = $request->input('name');
//         $project->description = $request->input('description');
//         $project->duration = $request->input('duration');
//         $project->cost = $request->input('cost');
//         $project->status = $request->input('status');
//         $project->save();

//         return redirect()->back()->with('message', 'Project Updated Successfully');
//     }
//     return redirect()->back()->with('message', 'Project Not Found');
// }


}


