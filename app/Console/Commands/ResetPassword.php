<?php

namespace App\Console\Commands;

use App\User;
use Cerbero\CommandValidator\ValidatesInput;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class ResetPassword extends Command
{
    use ValidatesInput;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:reset-password {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset a password for a given email address';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function rules()
    {
        return [
            'email' => 'required|string|email|max:255',
        ];
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $email = $this->argument('email');
        $user  = User::where(compact('email'))->first();

        if (empty($user)) {
            $this->error(sprintf(
                'No user found for email: %s',
                $email
            ));
            return;
        }

        $attempt = [
            'password'              => $this->secret("Enter your new password"),
            'password_confirmation' => $this->secret('Verify the password'),
        ];

        if (!$this->validatePassword($attempt)) {
            $this->error('Invalid password. Run this command again');
            return;
        }

        $user->password = bcrypt($attempt['password']);
        $user->save();

        $this->info('Password updated successfully. Log in at /manage');
    }

    private function validatePassword(array $attempt) : bool
    {
        $validator = Validator::make(
            $attempt,
            [
                'password' => 'required|string|min:6|confirmed',
            ]
        );

        if ($validator->fails()) {
            return false;
        }

        return true;
    }
}
