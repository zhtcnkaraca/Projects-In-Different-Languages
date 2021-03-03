using System;

namespace uc
{
    class Program
    {
        static void Main(string[] args)
        {
            //A Grubu Soru 3
            int sayi1, sayi2;
            Console.WriteLine("Sayı bir:");
            sayi1 = Convert.ToInt32(Console.ReadLine());
            Console.WriteLine("Sayı iki:");
            sayi2 = Convert.ToInt32(Console.ReadLine());
            int ebob = EbobBul(sayi1, sayi2);
            Console.WriteLine("EBOB : " + ebob);

            Console.ReadKey();

        }
        static int EbobBul(int birincisayi, int ikincisayi)
        {
            if (ikincisayi == 0)
            {
                return birincisayi;
            }
            else
            {
                return EbobBul(ikincisayi, birincisayi % ikincisayi);
            }
        }

    }
}

