using Firebase.Auth;
using Firebase.Auth.Providers;
using System.ComponentModel;
using System.Windows.Input;

namespace ProjetoCantina.ViewModels
{
    internal class RegisterViewModel : INotifyPropertyChanged
    {
        private string webApiKey = "AIzaSyBDjAwhc7fMGI8vVx3jC2VO8H6ER4TBfZI"; // Fixed the webApiKey
        private INavigation _navigation;
        private string email;
        private string password; // Added password property

        public event PropertyChangedEventHandler? PropertyChanged;

        public string Email
        {
            get => email;
            set
            {
                email = value;
                RaisePropertyChanged(nameof(Email));
            }
        }

        public string Password // Added password property
        {
            get => password;
            set
            {
                password = value;
                RaisePropertyChanged(nameof(Password));
            }
        }

        public ICommand RegisterUser { get; }

        private void RaisePropertyChanged(string propertyName)
        {
            PropertyChanged?.Invoke(this, new PropertyChangedEventArgs(propertyName));
        }

        public RegisterViewModel(INavigation navigation)
        {
            this._navigation = navigation;
            RegisterUser = new Command(RegisterUserTappedAsync);
        }

        private async void RegisterUserTappedAsync()
        {
            try
            {
                var config = new FirebaseAuthConfig
                {
                    ApiKey = webApiKey,
                    AuthDomain = "projeto-cantina-421ee.firebaseapp.com",
                    Providers = new FirebaseAuthProvider[]
                    {
                        new EmailProvider()
                    }
                };

                var authClient = new FirebaseAuthClient(config);

                // Use actual email and password values
                var auth = await authClient.CreateUserWithEmailAndPasswordAsync(Email, Password);
                string token = await auth.User.GetIdTokenAsync();

                await App.Current.MainPage.DisplayAlert("Success", "User registered successfully!", "OK");
            }
            catch (Exception ex)
            {
                await App.Current.MainPage.DisplayAlert("Alert", ex.Message, "OK");
                throw;
            }
        }
    }
}
