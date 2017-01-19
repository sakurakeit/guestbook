README
GuestBook API version 1.0

It's guest Book API with authorization via OAuth 2.0.
Lavavel 5.3 + Passport(Oauth 2.0)

You can use next requests:
GET guestbook/oauth/clients
1) Authorization get token:
    POST: http://guestbook/oauth/token
            client_secret:QdYBRecKrvfx8Ei4kDgBsa7aHwz2q3dIwGd8ksqh
            client_id:2
            username:test@test.com(your username)
            password:password(your password)
            scope:
            grant_type:password
    RESPONSE:
    {
      "token_type": "Bearer",
      "expires_in": 1296000,
      "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjZkNWIzMWMzOTdkNTc5OWVhZTE2YzM0NTlhYzViYWY0MTA0M2Q3ODg1NzU3ZjI0YmMxYTk2YWEyN2QzMTkwNGJkZTJhNTM2NjBkOTNkMjJmIn0.eyJhdWQiOiIyIiwianRpIjoiNmQ1YjMxYzM5N2Q1Nzk5ZWFlMTZjMzQ1OWFjNWJhZjQxMDQzZDc4ODU3NTdmMjRiYzFhOTZhYTI3ZDMxOTA0YmRlMmE1MzY2MGQ5M2QyMmYiLCJpYXQiOjE0ODQ3NzI0MTYsIm5iZiI6MTQ4NDc3MjQxNiwiZXhwIjoxNDg2MDY4NDE2LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.F73vBgMRNu6OCJyDSQXEV-va5TBRn9ah1XgXe8stJpjewwr-zS72Wspi3eFME77fQGtG5PT-q5wuyvMUZH8cNsLpEneIO1wGN7zL_fmEIFz3B1ZTAlfx3WPkOeBe0NyNlQiP48Y7bzcT8R2L4NmdzFEK88YsXFiellL3W2-5hP7mibI18r1Ps-RBgsikZU1ZKyEUxkYwfmKThz67znKFB6qDSfL-zyYTup5ZNMwb724WSVmoSHVJyOEyYXte_08-y2gS5r8RYPnICSDsBkC7VNZh5GnBANcgN_sxPRkJFXJL9HWcMqbCo2V3rG8in_IWxboy95m_pD60KOt09_KTMyDYdjhlVxPlMdjyrAZ2WMo0-GCcLBqvxGj3zSM7j0fOzqcEDbTcvPMIS9lzVejTUE6yxtPGSiEnwIHsT8QMUjKiHoJIhwTsRD3WpGSZq7xdZUwhVb0vE2EyVFYqPpD_RU4xw0CBl0kbPkaAUjkQ_mWCnD4kVVzvVIdA-e1YN8lbLYjSTCdkZjK1TWL5CYQel64Chs-ESvg71w7xJea6o1iEV10oZynw8fMeIfakiFytpwPkPaxUXI1iyWWtGDeUBakSj0kNwFjRBXhweJOv6Dn0J33CPBjQqjF5Wp1s6ken4lmUjfXhEx3gqSXy7tuR9XRMcrBkbX2Gx4N8DFyBgEo",
      "refresh_token": "Epgvh9JNk8bak6BnLw9QM0C6xzC9P09xqCCM39W9VWlBJre6xoDOlAf8PXaRd4FsuH4Pa7+Vh3i1zSFTUPBTPEbHLjL3QtCFy1Unw96jdPMlpf2CRAf9/wD3HOGbsRYj265u02vFsGVz8Xwk285/4uWuMDR0b2zUebkxuIwIeHWCePR1CI9W5JTXJzsrCkj6bWXBk81nq51sPynLNIEM82/85ZyclNCqLIFqFXHl6x8AFMyUYiZ9ovg8541GZwigEhgWtLE/rYfoDytD1Bo+5QvDJYWoBv8iABSaXcGd/zVa6w6Q0R0gRtQ6Uc0XuKNO6hRtjA1eVQRQEOQfUn4B4QLhC1l5wkdob37z9zBWvqU/OE0Ujgpa48oL/RgyeR+Bvxro3PHXzJK5YaRfdYA+7GTjNsD+VniYWIIf2yDYpgxhWfE06SyvwQ8jJGMpS+10JtDQ1jZCdL9WcPf5ZosV5lJcx1UFw0ThhzBJUXgUyMzwYG6BEbZ5Qcd37hfhn02jNvGjWp0TIZVtI7u0vLPgtu06bySJA7MfVboj4cvZaaLYdpfS1iI8Q3VZQTE59Yb290j8k528lNG7+rQj1tVSZMlZQ5b9L2V6ouDID+7qFdPHBsmIWt1kbB4aBbeRrwjZ7urbaxGunmsgajGzO2kvChP2YkQOdlu6Tcka/LWo+NM="
    }
In the next requests - in hearder ADD: Authorization:Bearer access_token
2) Registration- create a new user into application:
POST: guestbook/signup
        email	test3@test.com(your email)
        name	name3(your username)
        password	password(your password)
//3) Log in:
//    POST: guestbook/oauth/login
//        email:test2@test.com
//        password:password
--------------------------------------------------------
4) View list comments:
    GET: guestbook/api/comments
5) Add comment:
   POST: message:message 6

6) Add response to the comment:
   POST: message:message 7
         parent_id:3
   where parent_id - id comment;
7) View a pagination list of comments with the answers:
    GET: guestbook/api/comments/paginate/n
    where n - count items per page;
---------------------------------------------------------------------------------------
