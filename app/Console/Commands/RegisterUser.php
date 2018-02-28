<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Console\Command;


class RegisterUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:register';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Register a user for the management console';

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
        $data = [
            'name'                  => $this->ask('Enter your username'),
            'email'                 => $this->ask('Enter an email'),
            'password'              => $this->secret('Enter a password'),
            'password_confirmation' => $this->secret('Verify the password'),
        ];

        if (!$this->validateCredentials($data)) {
            $this->error('There was an error with your credentials. Try again');
            return;
        }

        $this->registerUser($data);
        $this->info(sprintf('Registration successful for %s', $data['name']));
    }

    private function validateCredentials(array $data) : bool
    {
        $validator = Validator::make(
            $data,
            [
                'name'     => 'required|string|max:255',
                'email'    => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]
        );

        if ($validator->fails()) {
            return false;
        }

        return true;
    }

    private function registerUser(array $data)
    {
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
