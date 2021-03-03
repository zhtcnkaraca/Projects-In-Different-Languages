using System;

namespace bir
{
    class Program
    {
        static void Main(string[] args)
        {
            // A Grubu Soru 1
            Console.Write("Vize notunu giriniz: ");
            double vize = Convert.ToDouble(Console.ReadLine());
            Console.Write("Final notunu giriniz: ");
            double final = Convert.ToDouble(Console.ReadLine());
            Console.Write("Proje notunu giriniz: ");
            double proje = Convert.ToDouble(Console.ReadLine());

            double ortalama = (vize * 30 / 100) + (final * 40 / 100) + (proje * 30 / 100);

            Console.WriteLine("Ortalamanız = " + ortalama);

            if (ortalama >= 60)
            {
                Console.WriteLine("Ortalamanız:" + ortalama + " " + "Geçtiniz");
            }
            else if (ortalama <= 60 && ortalama >= 40)
            {
                Console.WriteLine("Ortalamanız:" + ortalama + " " + "Bütünleme sınavına girmeniz gerekiyor");
            }
            else
            {
                Console.WriteLine("Ortalamanız:" + ortalama + " " + "Dersten kaldınız");
            }
            Console.ReadKey();
        }
    }
}
