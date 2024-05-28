using ProjetoCantina.ViewModels;

namespace ProjetoCantina;

public partial class RegisterPage : ContentPage
{
    public RegisterPage()
    {
        InitializeComponent();
        BindingContext = new RegisterViewModel(Navigation);
    }
}