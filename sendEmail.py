from os import system

executeQueue = 'php artisan queue:work'
attempts = 0

while True:
    attempts += 1
    print(f'Executing queue: attempt {attempts}')
    system(executeQueue)

    