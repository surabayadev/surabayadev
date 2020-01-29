<section style="padding: 80px 0px 40px 0px;">
    <div class="container">
        <div class="col-md-8 offset-md-2">
            <h2 class="mb-5">
                Personal Info

                @if ($user->id === optional(auth()->user())->id)
                    <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-secondary">Edit</a>
                @endif
            </h2>
            <table class="table">
                @if ($user->status === \App\Models\User::STATUS_NORMAL)
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $user->phone }}</td>
                    </tr>
                @endif

                <tr>
                    <th>Gender</th>
                    <td>{{ $user->gender === 'm' ? 'Lanang' : 'Wedok'}}</td>
                </tr>
                <tr>
                    <th>Province</th>
                    <td>{{ $user->province }}</td>
                </tr>
                <tr>
                    <th>City</th>
                    <td>{{ $user->city }}</td>
                </tr>

                @if ($user->status === \App\Models\User::STATUS_NORMAL)
                    <tr>
                        <th>Address</th>
                        <td>{{ $user->address }}</td>
                    </tr>
                @endif
                <tr>
                    <td colspan="100%">
                        <p style="font-weight: bold;">Socials</p>
                        @foreach ($providers as $p)
                            @if ($user->{$p})
                                <a href="{{ $user->transformSocialLink($p) }}" target="_blank" class="btn btn-primary btn-sm m-2" data-toggle="tooltip" title="{{ ucfirst($p) }}">
                                    <i class="mr-1 fab fa-{{ $p }}"></i>
                                    {{ $user->{$p} }}
                                </a>
                            @endif
                        @endforeach
                    </td>
                </tr>
            </table>


            <p>&nbsp;</p>
            <h2 class="mb-5">Linked Accounts</h2>
            <table class="table">
                <tr>
                    <th><i class="fab fa-github"></i> Github</th>
                    <td>
                        @if ($github = $user->hasSocial('github'))
                            <span class="text-success"><i class="fas fa-check"></i> Connected</span>
                        @else
                            <a href="{{ route('login.social', 'github') }}" class="btn btn-sm btn-secondary"><i class="fas fa-plug"></i> Connect</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th><i class="fab fa-facebook"></i> Facebook</th>
                    <td>
                        @if ($fb = $user->hasSocial('facebook'))
                            <span class="text-success"><i class="fas fa-check"></i> Connected</span>
                        @else
                            <a href="{{ route('login.social', 'facebook') }}" class="btn btn-sm btn-secondary"><i class="fas fa-plug"></i> Connect</a>
                        @endif
                    </td>
                </tr>
            </table>

            
            <p>&nbsp;</p>
            <h2 class="mb-5">Activities</h2>
            <p class="lead text-muted">Coming Soon...</p>
        </div>
    </div>
</section>