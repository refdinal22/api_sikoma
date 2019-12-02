<?php
namespace App\Console\Commands;
 
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
 
class RevisionDeadline extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'admin:deadline';
 
  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Check Revision Deadline';
 
  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }
 
  /**
   * Execute the console command.
   *
   * @return mixed
   */
  public function handle()
  {
    // calculate new statistics
    $proposal = App\Proposal::where('status', '=', "REVISION");      
    
    // update statistics table
    foreach($proposal as $prop)
    {
      // DB::table('users_statistics')
      // ->where('user_id', $post->user_id)
      // ->update(['total_posts' => $post->total_posts]);
    }
  }
}