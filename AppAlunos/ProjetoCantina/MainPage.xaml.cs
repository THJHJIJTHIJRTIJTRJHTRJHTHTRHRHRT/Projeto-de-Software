using ProjetoCantina.ViewModels;

namespace ProjetoCantina
{
    public partial class MainPage : ContentPage
    {

        public MainPage()
        {
            InitializeComponent();
            BindingContext = new LoginViewModel(Navigation);
        }
    }

}
