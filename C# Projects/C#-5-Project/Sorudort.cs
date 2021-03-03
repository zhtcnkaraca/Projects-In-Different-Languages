using System;

namespace dort
{
    class Program
    {
        static void Main(string[] args)
        {
            //A Grubu Soru 4
            Console.Write("Cümle Giriniz: ");
            string cümle = Console.ReadLine();

            string[] kelime = cümle.Split(' ');
            string tersi = "";
            for (int i = kelime.Length - 1; i >= 0; i--)
            {
                tersi += kelime[i] + ' ';
            }

            Console.WriteLine("Tersi: " + tersi);
            Console.ReadKey();
        }
    }
}
